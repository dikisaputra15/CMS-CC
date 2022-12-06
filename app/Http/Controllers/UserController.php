<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use RegistersUsers;
    
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(User::select('*'))
            ->addColumn('action', function($row){
                 $updateButton = "<a href='/admin/$row->id/edituser' title='Edit'><i class='fa fa-edit'></i></a>";
                 $deleteButton = "<a href='#' class='deleteUser' data-id='".$row->id."'><i class='fa fa-trash'></i></a>";
                 return $updateButton." ".$deleteButton;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.manageuser');
    }

    public function adduser()
    {
        return view('auth.register');
    }

    public function storeregister(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->role
        ]);

        return redirect('admin/user')->with('alert-primary','user created successfully');
       
    }

    public function edituser($id)
    {
        $user = User::find($id);
        return view('admin.edituser', compact(['user']));
    }

    public function updateuser($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->except(['_token','submit']));
        return redirect('admin/user')->with('alert-primary','User Updated');
    }

    public function destroyuser(Request $request)
    {
        $id = $request->post('id');

        $empdata = User::find($id);

        if($empdata->delete()){
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully'; 
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response); 
    }

    public function changeuserpass($id)
    {
        $user = User::find($id);
        return view('admin.changeuserpass', compact(['user']));
    }

    public function updatepass(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId($request->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('admin/user')->with('alert-primary','password updated');

    }

}
