<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Detail_client;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            elseif($request->color_id == 1)
            {
                $data = DB::table('detail_clients')
                ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
                ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
                ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
                ->select('clients.*', 'notes.*', 'services.*', 'detail_clients.*')
                ->whereRaw('DATEDIFF(detail_clients.end_date, current_date()) > 90')
                ->get();
            }
            elseif($request->color_id == 2)
            {
                $data = DB::table('detail_clients')
                ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
                ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
                ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
                ->select('clients.*', 'notes.*', 'services.*', 'detail_clients.*')
                ->whereRaw('DATEDIFF(detail_clients.end_date, current_date()) < 30')
                ->get();
            }
            elseif($request->color_id == 3)
            {
                $data = DB::table('detail_clients')
                ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
                ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
                ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
                ->select('clients.*', 'notes.*', 'services.*', 'detail_clients.*')
                ->whereRaw('DATEDIFF(detail_clients.end_date, current_date()) < 45')
                ->whereRaw('DATEDIFF(detail_clients.end_date, current_date()) >= 30')
                ->get();
            }
            elseif($request->color_id == 4)
            {
                $data = DB::table('detail_clients')
                ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
                ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
                ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
                ->select('clients.*', 'notes.*', 'services.*', 'detail_clients.*')
                ->whereRaw('DATEDIFF(detail_clients.end_date, current_date()) >= 45')
                ->whereRaw('DATEDIFF(detail_clients.end_date, current_date()) <= 90')
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
           ->addColumn('start_date', function($row){
                $data = date("Y-M-d", strtotime($row->start_date));
                return $data;
           })
           ->addColumn('end_date', function($row){
                $data = date("Y-M-d", strtotime($row->end_date));
                return $data;
            })
           ->rawColumns(['action','start_date','end_date'])
           ->addIndexColumn()
           ->make(true);
        }

        $service = Service::all();
        return view('admin.dashboard', compact(['service']));
    }
}
