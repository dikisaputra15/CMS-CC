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
        return view('admin.profile');
    }

    public function changeprofile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->update([
                'name' => Str::title($request->name),
                'email' => $request->email
        ]);

        return redirect('admin/profile')->with('alert-primary','Profile Updated');

    }

}