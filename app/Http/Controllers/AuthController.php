<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Redirect;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login2')->with('alert-success','selamat, Anda Berhasil Login');
    }

    public function postlogin(Request $request)
    {
      // echo "$request->email.$request->password "; die;
    	if(Auth::attempt($request->only('email','password'))){
            $akun = DB::table('users')->where('email', $request->email)->first();
            dd($akun);
            // if($akun->role =='administrator'){
            //     Auth::guard('administrator')->LoginUsingId($akun->id);
            //     return redirect('/admin/dashboard')->with('alert-success','selamat, Anda Berhasil Login');
            // }else if($akun->role =='user1'){
            //     Auth::guard('user1')->LoginUsingId($akun->id);
            //     return redirect('/admin/dashboard')->with('alert-success','selamat, Anda Berhasil Login');
            // }elseif ($akun->role =='user2') {
            //     Auth::guard('user2')->LoginUsingId($akun->id);
            //     return redirect('/admin/dashboard')->with('alert-success','selamat, Anda Berhasil Login');
            // }elseif ($akun->role =='user3') {
            //     Auth::guard('user3')->LoginUsingId($akun->id);
            //     return redirect('/admin/dashboard')->with('alert-success','selamat, Anda Berhasil Login');
            // }elseif ($akun->role =='user4') {
            //     Auth::guard('user4')->LoginUsingId($akun->id);
            //     return redirect('/admin/dashboard')->with('alert-success','selamat, Anda Berhasil Login');
            // }elseif ($akun->role =='user5') {
            //     Auth::guard('user5')->LoginUsingId($akun->id);
            //     return redirect('/admin/dashboard')->with('alert-success','selamat, Anda Berhasil Login');
            // }
    	}
    	// return redirect('/login')->with('alert-warning','akun belum terdaftar');
    }

    public function logout()
    {
        if(Auth::guard('administrator')->check()){
            Auth::guard('administrator')->logout();
        } else if(Auth::guard('user1')->check()){
            Auth::guard('user1')->logout();
        } else if(Auth::guard('user2')->check()){
            Auth::guard('user2')->logout();
        } else if(Auth::guard('user3')->check()){
            Auth::guard('user3')->logout();
        } else if(Auth::guard('user4')->check()){
            Auth::guard('user4')->logout();
        } else if(Auth::guard('user5')->check()){
            Auth::guard('user5')->logout();
        }
    	return redirect('/login')->with('alert-success','Anda Telah Logout');
    }

}
