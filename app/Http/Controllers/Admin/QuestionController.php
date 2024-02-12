<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::latest()->get();
        return view('admin.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);
        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'answer'=>'required',
        ]);

        $question = Question::find($id);
        $question->answer = $request->answer;
        $question->slug = Str::random(20).uniqid();
        $question->answered_by = Auth::id();
        $question->status = TRUE;
        $question->save();

        Toastr::success('Question successfully saved', 'Successful');
        return redirect()->route('admin.question.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $this->validate($request, [
            'confirm'=>'required',
        ]);

        if($request->confirm == 'confirm')
        {
            $question = Question::find($id)->delete();
            Toastr::success('Question successfully deleted', 'Successful');
            return redirect()->back();
        }
        else
        {
            Toastr::error('Wrong confirmation name given. Failed to delete', 'Failed');
            return redirect()->back();
        }
    }
}
