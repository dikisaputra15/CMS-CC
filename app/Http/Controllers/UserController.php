<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use RegistersUsers;
    
    public function index()
    {
        return view('admin.manageuser');
    }

    public function adduser()
    {
        return view('auth.register');
    }

    public function storeregister(Request $request)
    {
        $user = User::find(Auth::user()->id);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->new_password),
            'type' => $request->role
        ]);

        if($user->type == 'admin'){
            return redirect('admin/user')->with('alert-primary','selamat, user berhasil dibuat');
        }else{
            return redirect('user/user')->with('alert-primary','selamat, user berhasil dibuat');
        }
    }
}
