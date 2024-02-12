<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\Subscriber;
use App\Models\User;
use App\Notifications\NewCourseCreated;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.course.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|unique:courses,name',
            'category_id'=>'required',
            'duration'=>'required|integer',
            'price'=>'required|integer',
            'summary'=>'required',
            'course_desc'=>'required',
            'image'=>'required|mimes:jpg,png,bmp,jpeg'
        ]);


        // Get the image
        $image = $request->file('image');
        $slug = Str::slug($request->name).'-'.uniqid();

        if (isset($image))
        {
            // Make a new name for the image uploaded
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug . '-'. $currentDate . '-'. uniqid(). '.'. $image->getClientOriginalExtension();


            // Make course images folder
            if (!Storage::disk('public')->exists('course'))
            {
                Storage::disk('public')->makeDirectory('course');
            }

            // resizing image for upload
            $courseImage = Image::make($image)->resize(1280, 853)->stream();
            Storage::disk('public')->put('course/'. $imageName, $courseImage);
        }
        else
        {
            $imageName = 'default.png';
        }

        $course = new Course();
        $course->name = $request->name;
        $course->slug = $slug;
        $course->short_desc = $request->summary;
        $course->desc = $request->course_desc;
        $course->duration = $request->duration;
        $course->pricing = $request->price;
        $course->featured_image = $imageName;
        $course->category_id = $request->category_id;
        $course->user_id = Auth::id();
        $course->save();

        Toastr::success('Course Successfully saved', 'Success');
        return redirect()->route('admin.course.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        $users = StudentCourse::where('course_id', $course->id)->latest()->get();
        return view('admin.course.show', compact('course', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::all();
        return view('admin.course.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'category_id'=>'required',
            'duration'=>'required|integer',
            'price'=>'required|integer',
            'summary'=>'required',
            'course_desc'=>'required',
            'image'=>'mimes:jpg,png,bmp,jpeg'
        ]);


        // Get the image
        $image = $request->file('image');
        $slug = Str::slug($request->name).'-'.uniqid();

        $course = Course::findOrFail($id);

        if (isset($image))
        {
            // Make a new name for the image uploaded
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug . '-'. $currentDate . '-'. uniqid(). '.'. $image->getClientOriginalExtension();


            // Make course images folder
            if (!Storage::disk('public')->exists('course'))
            {
                Storage::disk('public')->makeDirectory('course');
            }

             // Delete the older image
             if (Storage::disk('public')->exists('course/'.$course->featured_image))
             {
                 Storage::disk('public')->delete('course/'.$course->featured_image);
             }

            // resizing image for upload
            $courseImage = Image::make($image)->resize(1280, 853)->stream();
            Storage::disk('public')->put('course/'. $imageName, $courseImage);
        }
        else
        {
            $imageName = $course->featured_image;
        }

        $course->name = $request->name;
        $course->slug = $slug;
        $course->short_desc = $request->summary;
        $course->desc = $request->course_desc;
        $course->duration = $request->duration;
        $course->pricing = $request->price;
        $course->featured_image = $imageName;
        $course->category_id = $request->category_id;
        $course->user_id = Auth::id();
        $course->status = $course->status;
        $course->save();

        Toastr::success('Course Successfully saved', 'Success');
        return redirect()->route('admin.course.index');
    }


    /**
     * Approve the course using function approve
     */
    public function approve(Request $request, $id)
    {

        $this->validate($request, [
            'name'=>'required',
        ]);

        $course = Course::findOrFail($id);
        $courseName = $course->name;
        $inputName = $request->name;


        // return strlen($inputName) . '    '  . strlen($inputName)-2;
        // return similar_text($courseName, $inputName, $perc);
        // similar_text($courseName, $inputName, $perc) > (strlen($courseName)-2)



        if ($request->name == "confirm")
        {
            if ($course->status) {
                $course->status = FALSE;
                $course->save();

                Toastr::success('Course Successfully De-activated', 'Successful');
                return redirect()->back();
            }
            else
            {
                $course->status = TRUE;
                $course->save();

                // Send an email to students and subscribers that a new course is available.
                $students = User::where('role_id', 3)->get()->toArray();
                $subs = Subscriber::all()->toArray();

                // merge students and subscribers array
                $users = array_merge($students, $subs);
                Notification::send($users, new NewCourseCreated($course));

                Toastr::success('Course Successfully approved', 'Successful');
                return redirect()->back();
            }


        }
        else
        {
            Toastr::error('You entered the wrong course name',  'Failed');
            return redirect()->back();
        }

    }

    /**
     * Show the payments done towards this course
     */
    public function coursePayments($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $courses = Course::active()->latest()->get();
        $coursePayments = StudentCourse::where('course_id', $course->id)->latest()->get();
        return view('admin.course.course-payments', compact('course','coursePayments', 'courses'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
