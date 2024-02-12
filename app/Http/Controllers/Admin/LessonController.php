<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Topic;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::latest()->get(); // order by unit id later
        return view('admin.topic.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::all();
        return view('admin.topic.lesson.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'video'=>'required|url',
            'lesson_notes'=>'required'
        ]);

        $lesson = new Lesson();
        $lesson->title = $request->name;
        $lesson->slug = Str::slug($request->name).uniqid();
        $lesson->featured_video = $request->video;
        $lesson->content = $request->lesson_notes;
        $lesson->status = TRUE;
        $lesson->topic_id = $request->topic_id;
        $lesson->user_id = Auth::id();
        $lesson->save();

        Toastr::success($lesson->title. ' Successfully added', 'Successful');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $this->validate($request, [
            'name'=>'required',
            'video'=>'required|url',
            'lesson_notes'=>'required'
        ]);

        $lesson->title = $request->name;
        $lesson->slug = Str::slug($request->name).uniqid();
        $lesson->featured_video = $request->video;
        $lesson->content = $request->lesson_notes;
        $lesson->status = TRUE;
        $lesson->topic_id = $request->topic_id;
        $lesson->user_id = Auth::id();
        $lesson->save();

        Toastr::success($lesson->title. ' Successfully updated', 'Successful');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
