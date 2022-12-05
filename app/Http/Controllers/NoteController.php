<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Detail_client;
use App\Models\Note;
use App\Models\Log_note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $color_id = $request->post('color_id');
        if($color_id == 1){
            $data = DB::table('detail_clients')
            ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
            ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
            ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
            ->select('detail_clients.id,detail_clients.id_client,detail_clients.id_service,detail_clients.end_date,detail_clients.start_date, services.id,services.nama_services, clients.id,clients.nama_client,clients.concord_poc, notes.id,notes.id_dclient,notes.notes')
            ->where('datediff(end_date, current_date( ))', '>', 90)
            ->get();
        }elseif($color_id == 2){
            $data = DB::table('detail_clients')
            ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
            ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
            ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
            ->select('detail_clients.id,detail_clients.id_client,detail_clients.id_service,detail_clients.end_date,detail_clients.start_date, services.id,services.nama_services, clients.id,clients.nama_client,clients.concord_poc, notes.id,notes.id_dclient,notes.notes')
            ->where('datediff(end_date, current_date( ))', '<', 30)
            ->get();
        }elseif($color_id == 3){
            $data = DB::table('detail_clients')
            ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
            ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
            ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
            ->select('detail_clients.id,detail_clients.id_client,detail_clients.id_service,detail_clients.end_date,detail_clients.start_date, services.id,services.nama_services, clients.id,clients.nama_client,clients.concord_poc, notes.id,notes.id_dclient,notes.notes')
            ->where('datediff(end_date, current_date( ))', '<', 45)
            ->where('datediff(end_date, current_date( ))', '>=', 30)
            ->get();
        }elseif($color_id == 4){
            $data = DB::table('detail_clients')
            ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
            ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
            ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
            ->select('detail_clients.id,detail_clients.id_client,detail_clients.id_service,detail_clients.end_date,detail_clients.start_date, services.id,services.nama_services, clients.id,clients.nama_client,clients.concord_poc, notes.id,notes.id_dclient,notes.notes')
            ->where('datediff(end_date, current_date( ))', '>=', 45)
            ->where('datediff(end_date, current_date( ))', '<=', 60)
            ->get();
        }else{
            $data = DB::table('detail_clients')
            ->leftjoin('clients', 'detail_clients.id_client', '=', 'clients.id')
            ->leftjoin('services', 'detail_clients.id_service', '=', 'services.id')
            ->leftjoin('notes', 'detail_clients.id', '=', 'notes.id_dclient')
            ->select('clients.*', 'notes.*', 'services.*', 'detail_clients.*')
            ->get(); 
        }

        return response()->json($data); 
    }

    public function addnote($id)
    {
        $dt = Detail_client::find($id);
        return view('admin.addnote', compact(['dt']));
    }

    public function storenote(Request $request)
    {
        Note::create([
            'id_dclient' => $request->id_detail,
            'notes' => $request->notes
        ]);

        Log_note::create([
            'id_dclient' => $request->id_detail,
            'notes' => $request->notes
        ]);

        return redirect('admin/dashboard')->with('alert-primary','Note added');  
    }

    public function editnote(Request $request)
    {
        $id = $request->id_detail;
        DB::table('notes')->where('id_dclient',$id)->update([
            'notes' => $request->notes
        ]);

        Log_note::create([
            'id_dclient' => $id,
            'notes' => $request->notes
        ]);
        
        return redirect('admin/dashboard')->with('alert-primary','Note diupdated');
    }

    public function destroydash(Request $request)
    {
        $id = $request->post('id');

        $empdata = DB::table('detail_clients')->where('id',$id)->delete();

        if($empdata){
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully'; 
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response); 
    }
}
