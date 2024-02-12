<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Topic;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        $topics = Topic::latest()->get(); //remember to order by unit
        return view('admin.topic.index', compact('topics', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return view('admin.topic.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'unit_id'=>'required',
            'objectives'=>'required'
        ]);

        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = Str::slug($request->name).uniqid();
        $topic->desc = $request->objectives;
        $topic->unit_id = $request->unit_id;
        $topic->user_id = Auth::id();
        $topic->save();

        Toastr::success($topic->name.' Successfully saved', 'Successful');
        return redirect()->route('admin.topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        $lessons = Lesson::where('topic_id', $topic->id)->orderBy('created_at', 'asc')->get();
        return view('admin.topic.show', compact('topic', 'lessons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        $units = Unit::all();
        return view('admin.topic.edit', compact('units', 'topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $this->validate($request, [
            'name'=>'required',
            'unit_id'=>'required',
            'objectives'=>'required'
        ]);

        $topic->name = $request->name;
        $topic->slug = Str::slug($request->name).uniqid();
        $topic->desc = $request->objectives;
        $topic->unit_id = $request->unit_id;
        $topic->user_id = Auth::id();
        $topic->save();

        Toastr::success($topic->name.' successfully updated', 'Successful');
        return redirect()->route('admin.topic.show', $topic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
