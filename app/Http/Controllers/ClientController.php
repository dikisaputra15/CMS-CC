<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // $prospec = Prospective_client::all();
        return view('admin.client');
    }

    public function addclient()
    {
        return view('admin.addclient');
    }
}
