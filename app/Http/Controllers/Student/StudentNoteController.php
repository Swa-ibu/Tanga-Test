<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentNote;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = StudentNote::where('user_id', Auth::id())->orderBy('lesson_id', 'asc')->latest()->get();
        return view('student.note.index', compact('notes'));
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
        $this->validate($request, [
            'notes'=>'required'
        ]);

        $notes = new StudentNote();
        $notes->lesson_id = $request->lesson_id;
        $notes->user_id = Auth::id();
        $notes->desc = $request->notes;
        $notes->save();

        Toastr::success('Notes Successfully saved', 'Successful');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentNote $studentNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentNote $studentNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'notes'=>'required'
        ]);

        $studentNote = StudentNote::find($id);
        $studentNote->lesson_id = $request->lesson_id;
        $studentNote->user_id = Auth::id();
        $studentNote->desc = $request->notes;
        $studentNote->save();

        Toastr::success('Notes Successfully updated', 'Successful');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $confirm = $request->confirm;

        if($confirm == "confirm")
        {
            $studentNote = StudentNote::find($id);
            $studentNote->delete();


            Toastr::success('Note successfully deleted', 'Success');

            return redirect()->back();
        }

        else
        {
            Toastr::error('You enter a wrong name. Note not deleted','Failed');
            return redirect()->back();
        }
    }
}
