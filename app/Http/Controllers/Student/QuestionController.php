<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use App\Notifications\NewQuestionPosted;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::answered()->orderBy('status', 'desc')->latest()->get();
        return view('student.question.index', compact('questions'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'question'=>'required|max:200',
        ]);

        $question = new Question();
        $question->slug = Str::random(20).uniqid();
        $question->question = $request->question;
        $question->user_id = Auth::id();
        $question->lesson_id = $request->lesson_id;
        $question->topic_id = $request->topic_id;
        $question->save();

        // Send a notification to admins/teachers that a new question has been psted.
        $admins = User::where('role_id', 1)->get(); // change this later to roles 1 and 2
        Notification::send($admins, new NewQuestionPosted($question));

        Toastr::success('Question successfully posted', 'Success');
        return redirect()->back();
    }
}
