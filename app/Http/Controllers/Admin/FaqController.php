<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FAQ::latest()->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'answer'=>'required',
        ]);

        $faq = new FAQ();
        $faq->title = $request->name;
        $faq->desc = $request->answer;
        $faq->user_id = Auth::id();
        $faq->save();

        Toastr::success('Faq successfully saved', 'Successful');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'answer'=>'required',
        ]);

        $faq = FAQ::find($id);
        $faq->title = $request->name;
        $faq->desc = $request->answer;
        $faq->user_id = Auth::id();
        $faq->save();

        Toastr::success('Faq successfully updated', 'Successful');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            'confirm'=>'required',
        ]);

        if($request->confirm == 'confirm')
        {
            $faq = FAQ::find($id)->delete();
            Toastr::success('FAQ successfully deleted', 'Successful');
            return redirect()->back();
        }
        else
        {
            Toastr::error('Wrong confirmation name given. Failed to delete', 'Failed');
            return redirect()->back();
        }
    }
}
