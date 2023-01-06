<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Archive_service;
use App\Exports\NptExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index()
    {
        $view = DB::table('archive_services')
        ->join('clients', 'archive_services.id_client', '=', 'clients.id')
        ->join('services', 'archive_services.id_service', '=', 'services.id')
        ->select('clients.*', 'archive_services.*', 'services.*')
        ->get();

        if(request()->ajax()) {
            return datatables()->of($view)
            ->addIndexColumn()
            ->make(true);
        }

        return view('admin.export');
    }

    public function export() 
    {
        return Excel::download(new NptExport, 'NptExport.xlsx');
    }
}
