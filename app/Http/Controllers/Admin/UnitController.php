<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::latest()->get(); // remember to orderBy course;
        return view('admin.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.unit.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'courses'=>'required',
            'summary'=>'required',
        ]);

        $unit = new Unit();
        $unit->name = $request->name;
        $unit->slug = Str::slug($request->name).uniqid();
        $unit->short_desc = $request->summary;
        // $unit->desc = $request->unit_desc;
        $unit->user_id = Auth::id();
        $unit->save();

        $unit->courses()->attach($request->courses);

        Toastr::success('Unit Successfully Added', 'Success');
        return redirect()->route('admin.unit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return view('admin.unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        $courses = Course::all();
        return view('admin.unit.edit', compact('unit', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $this->validate($request, [
            'name'=>'required',
            'courses'=>'required',
            'summary'=>'required',
        ]);

        $unit->name = $request->name;
        $unit->slug = Str::slug($request->name).uniqid();
        $unit->short_desc = $request->summary;
        // $unit->desc = $request->unit_desc;
        $unit->user_id = Auth::id();
        $unit->save();

        $unit->courses()->sync($request->courses);

        Toastr::success('Unit Successfully Added', 'Success');
        return redirect()->route('admin.unit.show', $unit->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
