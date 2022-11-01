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
        return view('admin.addsumcli', compact(['service','dt']));
    }

    public function storesumcli(Request $request)
    {
        Log_service_client::create([
            'id_client' => $request->id_client,
            'id_service' => $request->service_id,
            'date' => $request->date,
            'remarks' => $request->remarks
        ]);
        return redirect('admin/'."{$request->id_client}".'/detailcli')->with('alert-primary','selamat, Data berhasil ditambah');
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

        return redirect('admin/'."{$request->id_client}".'/detailcli')->with('alert-primary','selamat, Data berhasil diupdate');
    }
}
