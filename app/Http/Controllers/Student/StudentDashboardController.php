<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LastAccessedLesson;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\StudentCourse;
use App\Models\StudentNote;
use App\Models\Unit;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $courses = Course::active()->inRandomOrder()->limit(2)->get();
        $activeCourseId = Course::select('id')->active()->get(); // select only the active courses.
        $stdCourses = StudentCourse::where('user_id', Auth::id())->whereIn('course_id', $activeCourseId)->latest()->get();
        $lastAccessedLesssons = LastAccessedLesson::studentslastaccessed(); // select only 3 last accessed lessons;
        $enrollDate = StudentCourse::orderBy('created_at', 'desc')->first();
        return view('student.index', compact('courses', 'stdCourses', 'lastAccessedLesssons', 'enrollDate'));
    }

    public function course()
    {
        $activeCourseId = Course::select('id')->active()->get(); // select only the active courses.
        $stdCourses = StudentCourse::where('user_id', Auth::id())->whereIn('course_id', $activeCourseId)->latest()->get();

        // Getting all the courses the student is not enrolled in.
        foreach($stdCourses as $stdCourse)
        {
            $studentCourses[] = $stdCourse->course_id;
        }

        $courses = Course::active()->whereNotIn('id', $studentCourses)->latest()->paginate(6);
        return view('student.course.all-course', compact('courses', 'stdCourses'));
    }

    /**
     * Student Courses
     */
    public function studentCourse()
    {
        $courses = StudentCourse::where('user_id', Auth::id())->latest()->paginate(4);
        return view('student.course.student-course', compact('courses'));
    }

    public function payACourse($slug)
    {
        $course = Course::where('slug', $slug)->first();
        return view('student.enroll', compact('course'));
    }


    public function resumeLearningUnit($slug)
    {
        $unit = Unit::where('slug', $slug)->first();

        return view('student.unit', compact('unit'));
    }

    public function resumeLearningLesson($slug)
    {
        $lesson = Lesson::where('slug', $slug)->first();

         // Incrementing the view_count
         $blogKey = 'lesson_' . $lesson->id;


         if (!Session::has($blogKey)) {
             $lesson->increment('view_count');
             Session::put($blogKey,1);
         }


        //  Register Last accessed lesson
        $lastAccessedLessson = new LastAccessedLesson();
        $lastAccessedLessson->user_id = Auth::id();
        $lastAccessedLessson->lesson_id = $lesson->id;
        $lastAccessedLessson->topic_id = $lesson->topic_id;
        $lastAccessedLessson->save();

        $allLessons = Lesson::where('topic_id', $lesson->topic_id)->get();
        $lessonNotes = StudentNote::where([['lesson_id', $lesson->id], ['user_id', Auth::id()]])->latest()->get();
        $questions = Question::where('topic_id', $lesson->topic_id)->answered()->latest()->get();
        $learntLessons = LastAccessedLesson::where('user_id', Auth::id())->where('topic_id', $lesson->topic_id)->get();

        foreach ($learntLessons as $lessonID) {
            $learntLessonsArray[] = $lessonID->lesson_id;
        }

        return view('student.lesson', compact('lesson', 'allLessons', 'lessonNotes', 'questions', 'learntLessons', 'learntLessonsArray'));
    }

    public function userProfile()
    {
        $user = Auth::id();
        return view('setting.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'about'=>'required'
        ]);

        $user = User::find(Auth::id());
         // Get the image
         $image = $request->file('image');
         $slug = Str::slug($request->name).'-'.uniqid();

         if (isset($image))
         {
             // Make a new name for the image uploaded
             $currentDate = Carbon::now()->toDateString();
             $imageName = $slug . '-'. $currentDate . '-'. uniqid(). '.'. $image->getClientOriginalExtension();


             // Make course images folder
             if (!Storage::disk('public')->exists('user'))
             {
                 Storage::disk('public')->makeDirectory('user');
             }

             // resizing image for upload
             $courseImage = Image::make($image)->resize(300, 300)->stream();
             Storage::disk('public')->put('user/'. $imageName, $courseImage);
         }
         else
         {
             $imageName = $user->featured_image;
         }

         $user->name = $request->name;
         $user->email = $user->email;
         $user->role_id = $user->role_id;
         $user->featured_image = $imageName;
         $user->about = $request->about;
         $user->save();

         Toastr::success($user->name. '\'s Profile successfully updated', 'Successful');
         return redirect()->back();
    }


    /**
     * Student Payments
     */
    public function studentPayments()
    {
        $payments = StudentCourse::where('user_id', Auth::id())->latest()->get();
        return view('student.payment.index', compact('payments'));
    }
}
