<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProspecController extends Controller
{
    public function index()
    {
        // $prospec = prospective_client::all();
        return view('admin.prospective');
    }

}
