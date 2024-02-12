<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        return view('teacher.index');
    }

    public function userProfile()
    {
        $user = Auth::id();
        return view('setting.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'about'=>'required'
        ]);

        $user = User::find(Auth::id());
         // Get the image
         $image = $request->file('image');
         $slug = Str::slug($request->name).'-'.uniqid();

         if (isset($image))
         {
             // Make a new name for the image uploaded
             $currentDate = Carbon::now()->toDateString();
             $imageName = $slug . '-'. $currentDate . '-'. uniqid(). '.'. $image->getClientOriginalExtension();


             // Make course images folder
             if (!Storage::disk('public')->exists('user'))
             {
                 Storage::disk('public')->makeDirectory('user');
             }

             // resizing image for upload
             $courseImage = Image::make($image)->resize(300, 300)->stream();
             Storage::disk('public')->put('user/'. $imageName, $courseImage);
         }
         else
         {
             $imageName = $user->featured_image;
         }

         $user->name = $request->name;
         $user->email = $user->email;
         $user->role_id = $user->role_id;
         $user->featured_image = $imageName;
         $user->about = $request->about;
         $user->save();

         Toastr::success($user->name. '\' Profile successfully updated', 'Successful');
         return redirect()->back();
    }
}
