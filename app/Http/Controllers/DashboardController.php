<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Detail_client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            if($request->category)
            {
                $data = DB::table('detail_clients')
                ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
                ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
                ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
                ->select('clients.*', 'notes.*', 'services.*', 'detail_clients.*')
                ->where('detail_clients.id_service', $request->category)
                ->get();
            }
            else
            {
                $data = DB::table('detail_clients')
                ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
                ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
                ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
                ->select('clients.*', 'notes.*', 'services.*', 'detail_clients.*')
                ->get();
            }

            return datatables()->of($data)
            ->addColumn('action', function($row){
                if(empty($row->notes)){
                    $updateButton = "<a href='#' data-id='".$row->id."' data-toggle='modal' data-target='#myModal' class='passingID' title='Notes'><i class='fa fa-edit'></i></a>";
                }else{
                    $updateButton = "<a href='#' data-id='".$row->id."' data-toggle='modal' data-target='#updatenote' class='updateid' title='Update Notes'><i class='fa fa-edit'></i></a>";
                }
                $deleteButton = "<a href='#' class='deleteDashboard' data-id='".$row->id."'><i class='fa fa-trash'></i></a>";
                return $updateButton." ".$deleteButton;
           })
           ->rawColumns(['action'])
           ->addIndexColumn()
           ->make(true);
        }

        $service = Service::all();
        return view('admin.dashboard', compact(['service']));
    }
}
