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
        $view = DB::table('documents')
        ->join('clients', 'documents.client_name', '=', 'clients.id')
        ->join('detail_clients', 'detail_clients.id_client', '=', 'clients.id')
        ->join('services', 'documents.type_of_service', '=', 'services.id')
        ->select('clients.*', 'documents.*', 'services.*', 'detail_clients.*')
        ->orderBy('documents.id', 'desc')
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
