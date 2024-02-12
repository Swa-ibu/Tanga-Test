<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\LessonExercise;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ExerciseController extends Controller
{
    /**
     * Function index
     */
    public function index()
    {
        $exercises = Exercise::latest()->get();
        $lessons = Lesson::orderBy('topic_id', 'asc')->orderBy('created_at', 'asc')->get();
        return view('admin.exercise.index', compact('exercises', 'lessons'));
    }

    /**
     * Function create; show create page
     */
    public function create()
    {
        $lessons = Lesson::orderBy('topic_id', 'asc')->orderBy('created_at', 'asc')->get();
        return view('admin.exercise.create', compact('lessons'));
    }

    /**
     * Function store
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|unique:exercises,title',
            'content'=>'required',
            'lessons'=>'required',
        ]);

        $exercise = new Exercise();
        $exercise->title = $request->name;
        $exercise->slug = Str::slug($request->name).uniqid();
        $exercise->desc = $request->content;
        $exercise->status = TRUE;
        $exercise->user_id = Auth::id();
        $exercise->save();

        $exercise->lessons()->attach($request->lessons);

        Toastr::success($exercise->title . ' Created Successfully', 'Successful');
        return redirect()->route('admin.exercise');
    }

    /**
     * Function edit
     */
    public function edit($id)
    {
        $lessons = Lesson::orderBy('topic_id', 'asc')->orderBy('created_at', 'asc')->get();
        $exercise = Exercise::find($id);
        return view('admin.exercise.edit', compact('exercise', 'lessons'));
    }


    /**
     * function to update an exercise
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'content'=>'required',
        ]);

        $exercise = Exercise::find($id);
        $exercise->title = $request->name;
        $exercise->slug = Str::slug($request->name).uniqid();
        $exercise->desc = $request->content;
        $exercise->save();

        $exercise->lessons()->sync($request->lessons);

        Toastr::success($exercise->title . ' Updated Successfully', 'Successful');
        return redirect()->route('admin.exercise');
    }

    /**
     * Attach an exercise to a lesson: note the model used
     */
    public function attach(Request $request)
    {
        // $this->validate($request, [
        //     'lesson_id' =>'required',
        // ]);

        // $eLesson = new LessonExercise();
        // $eLesson->exercise_id = $request->exercise_id;
        // $eLesson->lesson_id = $request->lesson_id;
        // $eLesson->user_id = Auth::id();
        // $eLesson->save();

        // Toastr::success('Exercise Successfully attached ', 'Successful');
        // return redirect()->back();
    }

    /**
     * fun to show attach a lesson to an exercise
     */
}
