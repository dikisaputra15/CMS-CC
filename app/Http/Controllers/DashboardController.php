<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Detail_client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $detail = DB::table('detail_clients')
        ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
        ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
        ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
        ->select('clients.*', 'notes.*', 'services.*', 'detail_clients.*')
        ->orderBy('detail_clients.id', 'desc')
        ->get();

        return view('admin.dashboard', compact(['detail']));
    }
}
