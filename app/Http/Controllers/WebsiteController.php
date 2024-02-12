<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\FAQ;
use App\Models\Review;
use App\Models\Subscriber;
use App\Models\User;
use App\Notifications\NewContactMessageEmail;
use App\Notifications\NewSubscriberEmail;
use App\Notifications\WelcomeSubscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Notification;

class WebsiteController extends Controller
{
    public function index()
    {
        $courses = Course::active()->latest()->get();
        $noOfUsers = User::count();
        $categories = Category::all(); // getting all categories
        return view('website.welcome', compact('courses', 'noOfUsers', 'categories'));
    }

    public function about()
    {
        $categories = Category::all();
        return view('website.about', compact('categories'));
    }

    public function course()
    {
        $courses = Course::active()->latest()->paginate(6);
        $categories = Category::all();
        $instructors = User::where('role_id', '<', 3)->latest()->get();
        return view('website.course-grid', compact('categories', 'courses','instructors'));
    }

    public function courseList()
    {
        $categories = Category::all();
        $courses = Course::active()->latest()->paginate(6);
        $instructors = User::where('role_id', '<', 3)->latest()->get();
        return view('website.course-list', compact('categories', 'courses', 'instructors'));
    }

    public function courseDetails($slug)
    {
        $course = Course::where('slug', $slug)->first();


        // Incrementing the view_count
        $blogKey = 'course_' . $course->id;


        if (!Session::has($blogKey)) {
            $course->increment('view_count');
            Session::put($blogKey,1);
        }

        $relatedCourses = Course::active()->get()->random(2);  // remember to change it to 6;
        $reviews = Review::where('course_id', $course->id)->active()->latest()->get();
        $categories = Category::all();
        return view('website.course-detail', compact('course', 'categories', 'reviews', 'relatedCourses'));
    }

    /**
     * Course based on a category
     */
    public function courseCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $relatedCourses = Course::active()->get()->random(2);  // remember to change it to 6;
        $courses = Course::where('category_id', $category->id)->active()->latest()->paginate(6);
        $instructors = User::where('role_id', '<', 3)->latest()->get();
        return view('website.course-grid', compact('courses', 'categories', 'relatedCourses', 'instructors'));
    }

    public function contact()
    {
        $categories = Category::all();
        return view('website.contact', compact('categories'));
    }

    public function postContactMessages(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $msg = new ContactUs();
        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        $msg->save();

        // If email is not available in the subscribers list; add it here
        if (!Subscriber::where('email', $request->email)->exists())
        {
            $subsciber = new Subscriber();
            $subsciber->name = $request->name;
            $subsciber->email = $request->email;
            $subsciber->save();


            // Send an email to all admins about the new subscriber registered
            $admins = User::where('role_id', 1)->get();
            Notification::send($admins, new NewSubscriberEmail($subsciber));
        }

        // Send an email to admins that we have a new contact message
        $admins = User::where('role_id', 1)->get();
        Notification::send($admins, new NewContactMessageEmail($msg));

        Toastr::success($msg->subject .' Sent successfully, thank you for the message', 'Success');
        return redirect()->back();
    }

    public function faq()
    {
        $categories = Category::all();
        $faqs = FAQ::latest()->get();
        return view('website.faq', compact('categories', 'faqs'));
    }

    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|unique:subscribers,email'
        ]);

        $subsciber = new Subscriber();
        $subsciber->name = 'Subscriber';
        $subsciber->email = $request->email;
        $subsciber->save();

        // Send an welcome email to welcome the new subscriber
        Notification::route('mail', $request->email)->notify(new WelcomeSubscriber($subsciber));

        // Send an email to all admins about the new subscriber registered
        $admins = User::where('role_id', 1)->get();
        Notification::send($admins, new NewSubscriberEmail($subsciber));

        Toastr::success($subsciber->email . ' Successfully subscribed');
        return redirect()->back();
    }

    public function generateCourseOutlinePdf($slug)
    {
        $course = Course::where('slug', $slug)->first();

        $pdf = Pdf::loadView('website.course-outline', compact('course'));

        return $pdf->download();

        // return view('website.course-outline')
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:3',
        ]);

        $name = $request->name;
        $categories = Category::all();
        $instructors = User::where('role_id', '<', 3)->latest()->get();
        $courses = Course::where('name', 'LIKE', "%$name%")->orderBy('view_count', 'desc')->paginate(6);
        return view('website.search', compact('name','courses', 'categories', 'instructors'));
    }

    public function advancedSearch(Request $request)
    {
        return $request->all();

        $this->validate($request, [

        ]);
    }
}
