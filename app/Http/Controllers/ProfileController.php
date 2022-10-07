<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        if($user->hasRole('admin')){
            return view('admin.profile');
        }else{
            return view('user.profile');
        }
    }

    public function changeprofile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if(empty($request->pass)){
            $user->update([
                'name' => Str::title($request->name),
                'email' => $request->email
            ]);
        }else{
            $user->update([
                'name' => Str::title($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->pass)
            ]);
        }

        if($user->hasRole('admin')){
            return redirect('admin/profile')->with('alert-primary','selamat, profile anda berhasil diubah');
        }else{
            return redirect('user/profile')->with('alert-primary','selamat, profile anda berhasil diubah');
        }

    }
}