<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Log_service_client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientlogController extends Controller
{
    public function addsumcli($id)
    {
        $service = service::all();
        $dt = Client::find($id);
        $log = DB::table('log_service_clients')->where('id_client', $id)->get()->last();
        return view('admin.addsumcli', compact(['service','dt','log']));
    }

    public function storesumcli(Request $request)
    {
        Log_service_client::create([
            'id_client' => $request->id_client,
            'id_service' => $request->service_id,
            'date' => $request->date,
            'remarks' => $request->remarks
        ]);
        return redirect('admin/'."{$request->id_client}".'/detailcli')->with('alert-primary','data added successfully');
    }

    public function editsumcli($id)
    {
        $dt = Log_service_client::find($id);
        $service = service::all();
        return view('admin.editsumcli', compact(['dt','service']));
    }

    public function updatesumcli($id, Request $request)
    {
        DB::table('log_service_clients')->where('id',$id)->update([
            'id_client' => $request->id_client,
            'id_service' => $request->service_id,
            'date' => $request->date,
            'remarks' => $request->remarks
		]);

        return redirect('admin/'."{$request->id_client}".'/detailcli')->with('alert-primary','Data berhasil diupdate');
    }

    public function logservices($id)
    {
        $log = DB::table('archive_services')
        ->join('clients', 'archive_services.id_client', '=', 'clients.id')
        ->join('services', 'archive_services.id_service', '=', 'services.id')
        ->select('clients.*', 'archive_services.start_date', 'archive_services.duration', 'archive_services.end_date', 'archive_services.id_client', 'archive_services.id', 'services.kode_services', 'services.nama_services')
        ->where('archive_services.id_client', $id)
        ->orderBy('archive_services.id', 'desc')
        ->get();

        $client = Client::find($id);

        return view('admin.logservices', compact(['log','client']));
    }
}
