<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChangepassController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.changepassword');
    }

    public function changepassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('admin/changepassword')->with('alert-primary','password changed successfully');
        
    }
}
