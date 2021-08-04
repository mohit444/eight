<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
         return 'i am in user';
    }

    public function uploadAvatar(Request $request)
    {
        if ( $request->hasFile('photo'))
        {
           $filename=$request->photo->getClientOriginalName();
           if(auth()->user()->avatar)
           {
               Storage::delete('/public/images/'.Auth()->user()->avatar);
           }
           $request->photo->storeAs('images',$filename,'public');
           auth()->user()->update(['avatar' => $filename]);
           return redirect()->back()->with('success', 'Profile Updated.');
        }

        return redirect()->back()->with('error', 'Profile not Updated.');
       
    }
}
