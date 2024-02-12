<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\UnitExercise;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UnitExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unitsSet = UnitExercise::select('id')->get();
        $units = Unit::whereNotIn('id',$unitsSet)->latest()->get();
        $unitExercises = UnitExercise::latest()->get();
        return view('admin.unit.exercise.index', compact('unitExercises', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

       $unitsSet = UnitExercise::select('id')->get();
       $units = Unit::whereNotIn('id',$unitsSet)->latest()->get();

        // Select * from units where not in (Select id from unit_exercises);

        return view('admin.unit.exercise.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'unit_id'=>'required|unique:unit_exercises,unit_id',
            'summary'=>'required'
        ]);

        $unit = Unit::find($request->unit_id)->name;

        $unitExercise = new UnitExercise();
        $unitExercise->slug = Str::slug($unit).uniqid();
        $unitExercise->unit_id = $request->unit_id;
        $unitExercise->desc =$request->summary;
        $unitExercise->status = TRUE;
        $unitExercise->user_id = Auth::id();
        $unitExercise->save();

        Toastr::success($unitExercise->units->name . ' Exercise created Successfully');
        return redirect()->route('admin.unit-exercise.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitExercise $unitExercise)
    {
        return view('admin.unit.exercise.show', compact('unitExercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitExercise $unitExercise)
    {
        return view('admin.unit.exercise.edit', compact('unitExercise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitExercise $unitExercise)
    {
        $this->validate($request, [
            'summary'=>'required',
        ]);

        $unitExercise->desc = $request->summary;
        $unitExercise->save();

        Toastr::success($unitExercise->units->name . ' Exercise updated successfully');
        return redirect()->route('admin.unit-exercise.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitExercise $unitExercise)
    {
        //
    }
}
