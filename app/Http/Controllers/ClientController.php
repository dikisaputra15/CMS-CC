<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Detail_client;
use App\Models\Archive_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all()->sortDesc();
        return view('admin.client', compact(['client']));
    }

    public function addclient()
    {
        $service = service::all();
        return view('admin.addclient', compact(['service']));
    }

    public function storeclient(Request $request)
    {
        $tgl1 = $request->start_date;
        $dur = $request->duration;
        $serviceid = $request->service_id;
        $tgl2 = date('Y-m-d', strtotime(''.+$dur.' month', strtotime($tgl1)));

        $client = Client::create([
            'nama_client' => $request->nama_client,
            'address' => $request->address,
            'client_since' => $request->client_since,
            'client_poc' => $request->client_poc,
            'concord_poc' => $request->concord_poc,
            'end_user_poc' => $request->enduser_poc,
            'no_of_subs' => $request->no_of_subscribe,
            'list_of_subs' => $request->list_of_subscribe,
            'contract_no' => $request->c_number,
            'contract_value' => $request->c_value
        ]);

        $clientid = $client->id;

        Detail_client::create([
            'id_client' => $clientid,
            'id_service' => $serviceid,
            'start_date' => $tgl1,
            'duration' => $dur,
            'end_date' => $tgl2
        ]);

        Archive_service::create([
            'id_client' => $clientid,
            'id_service' => $serviceid,
            'start_date' => $tgl1,
            'duration' => $dur,
            'end_date' => $tgl2
        ]);

        return redirect('admin/clients')->with('alert-primary','Data berhasil ditambah');
    }

    public function destroycli($id)
    {
        DB::table('clients')->where('id',$id)->delete();
        DB::table('detail_clients')->where('id_client',$id)->delete();
        return redirect('admin/clients')->with('alert-danger','Data berhasil dihapus');
    }

    public function editcli($id)
    {
        $client = Client::find($id);
        return view('admin.editcli', compact(['client']));
    }

    public function updatecli($id, Request $request)
    {
        DB::table('clients')->where('id',$id)->update([
            'nama_client' => $request->nama_client,
            'address' => $request->address,
            'client_since' => $request->client_since,
            'client_poc' => $request->client_poc,
            'concord_poc' => $request->concord_poc,
            'end_user_poc' => $request->enduser_poc,
            'no_of_subs' => $request->no_of_subscribe,
            'list_of_subs' => $request->list_of_subscribe,
            'contract_no' => $request->c_number,
            'contract_value' => $request->c_value
		]);

        return redirect('admin/clients')->with('alert-primary','Data berhasil diupdate');
    }

    public function detailcli($id)
    {
        $detail = DB::table('detail_clients')
        ->join('clients', 'detail_clients.id_client', '=', 'clients.id')
        ->join('services', 'detail_clients.id_service', '=', 'services.id')
        ->select('clients.*', 'detail_clients.start_date', 'detail_clients.duration', 'detail_clients.end_date', 'detail_clients.id_client', 'detail_clients.id', 'services.kode_services', 'services.nama_services')
        ->where('detail_clients.id_client', $id)
        ->get();

        $detail2 = DB::table('log_service_clients')
        ->join('clients', 'log_service_clients.id_client', '=', 'clients.id')
        ->join('services', 'log_service_clients.id_service', '=', 'services.id')
        ->select('log_service_clients.*', 'clients.nama_client', 'services.kode_services', 'services.nama_services')
        ->where('log_service_clients.id_client', $id)
        ->get();

        $detail3 = Client::find($id);

        return view('admin.detailcli', compact(['detail','detail2','detail3']));
    }

    public function addsrvcli($id)
    {
        $dt = Client::find($id);
        $service = service::all();
        return view('admin.addsrvcli', compact(['dt','service']));
    }

    public function storesrvcli(Request $request)
    {
        $tgl1 = $request->start_date;
        $dur = $request->duration;
        $tgl2 = date('Y-m-d', strtotime(''.+$dur.' month', strtotime($tgl1)));

        Detail_client::create([
            'id_client' => $request->id_client,
            'id_service' => $request->service_id,
            'start_date' => $tgl1,
            'duration' => $dur,
            'end_date' => $tgl2
        ]);

        Archive_service::create([
            'id_client' => $request->id_client,
            'id_service' => $request->service_id,
            'start_date' => $tgl1,
            'duration' => $dur,
            'end_date' => $tgl2
        ]);

        return redirect('admin/'."{$request->id_client}".'/detailcli')->with('alert-primary','Data berhasil ditambah');
    }

    public function editsrvcli($id)
    {
        $dt = Detail_client::find($id);
        $service = service::all();
        return view('admin.editsrvcli', compact(['dt','service']));
    }

    public function updatesrvcli($id, Request $request)
    {
        $tgl1 = $request->start_date;
        $dur = $request->duration;
        $tgl2 = date('Y-m-d', strtotime(''.+$dur.' month', strtotime($tgl1)));

        DB::table('detail_clients')->where('id',$id)->update([
            'id_client' => $request->id_client,
            'id_service' => $request->service_id,
            'start_date' => $tgl1,
            'duration' => $dur,
            'end_date' => $tgl2
		]);

        Archive_service::create([
            'id_client' => $request->id_client,
            'id_service' => $request->service_id,
            'start_date' => $tgl1,
            'duration' => $dur,
            'end_date' => $tgl2
        ]);

        return redirect('admin/'."{$request->id_client}".'/detailcli')->with('alert-primary','Data berhasil diupdate');
    }
}
