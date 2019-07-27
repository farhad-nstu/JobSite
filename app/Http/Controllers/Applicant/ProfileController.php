<?php

namespace App\Http\Controllers\Applicant;

use App\Job;
use App\Applicant;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(){
    	return view('applicant.profile.index');
    }

     public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'required|image',
            'resume' => 'required',
            'skill' => 'required',
        ]);

//         $image = $request->file('image');
//         $resume = $request->file('resume');
//         $slug = str_slug($request->first_name);
//         $user = Auth::guard('applicant')->user()->id;

//         if (isset($image))
//         {
//             $currentDate = Carbon::now()->toDateString();
//             $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//             if (!Storage::disk('public')->exists('profile'))
//             {
//                 Storage::disk('public')->makeDirectory('profile');
//             }
// //            Delete old image form profile folder
//             if (Storage::disk('public')->exists('profile/'.$user->image))
//             {
//                 Storage::disk('public')->delete('profile/'.$user->image);
//             }
//             $profile = Image::make($image)->resize(500,500)->save();
//             Storage::disk('public')->put('profile/'.$imageName,$profile);
//         } else {
//             $imageName = $user->image;
//         }

//                 if (isset($resume))
//         {
//             $currentDate = Carbon::now()->toDateString();
//             $resumeName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$resume->getClientOriginalExtension();
//             if (!Storage::disk('public')->exists('profile'))
//             {
//                 Storage::disk('public')->makeDirectory('profile');
//             }
// //            Delete old image form profile folder
//             if (Storage::disk('public')->exists('profile/'.$user->resume))
//             {
//                 Storage::disk('public')->delete('profile/'.$user->resume);
//             }
//             // $profile = Image::make($image)->resize(500,500)->save();
//             Storage::disk('public')->put('profile/'.$resumeName);
//         } else {
//             $resumeName = $user->resume;
//         }
        $user = Applicant::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->image =  $request->image;
        $user->resume =  $request->resume;
        $user->skill =  $request->skill;
        $user->save();

        return redirect(route('profile.index'))->with('message', 'profile update successfully');
    }

    public function show(){
    	$jobs = job::all();
    	return view('applicant.profile.showjob',compact('jobs'));
    }



}
