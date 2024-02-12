<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('status', 'desc')->latest()->get();
        return view('admin.review.index', compact('reviews'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'confirm'=>'required'
        ]);

        $review = Review::find($id);

        if($request->confirm == 'confirm')
        {
            $review->status = !$request->status;
            $review->save();

            Toastr::success('Review Updated successfully', 'Successful');
            return redirect()->back();
        }
        else
        {
            Toastr::error('Sorry AN error occurred', 'Error');
            return redirect()->back();
        }
    }
}
