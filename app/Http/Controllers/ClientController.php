<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
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
        $client = Client::all();
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
        $tgl2 = date('Y-m-d', strtotime(''.+$dur.' month', strtotime($tgl1)));

        Client::create([
            'service_id' => $request->service_id,
            'nama_client' => $request->nama_client,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'end_date' => $tgl2,
            'client_since' => $request->client_since,
            'client_poc' => $request->client_poc,
            'concord_poc' => $request->concord_poc,
            'end_user_poc' => $request->enduser_poc,
            'no_of_subs' => $request->no_of_subscribe,
            'list_of_subs' => $request->list_of_subscribe,
            'duration' => $request->duration
        ]);

        return redirect('admin/clients')->with('alert-primary','selamat, Data berhasil ditambah');
    }

    public function destroycli($id)
    {
        DB::table('clients')->where('id',$id)->delete();
        return redirect('admin/clients')->with('alert-danger','selamat, Data berhasil dihapus');
    }

    public function editcli($id)
    {
        $client = Client::find($id);
        $service = service::all();
        return view('admin.editcli', compact(['client','service']));
    }

    public function updatecli($id, Request $request)
    {
        $tgl1 = $request->start_date;
        $dur = $request->duration;
        $tgl2 = date('Y-m-d', strtotime(''.+$dur.' month', strtotime($tgl1)));

        DB::table('clients')->where('id',$id)->update([
			'service_id' => $request->service_id,
            'nama_client' => $request->nama_client,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'end_date' => $tgl2,
            'client_since' => $request->client_since,
            'client_poc' => $request->client_poc,
            'concord_poc' => $request->concord_poc,
            'end_user_poc' => $request->enduser_poc,
            'no_of_subs' => $request->no_of_subscribe,
            'list_of_subs' => $request->list_of_subscribe,
            'duration' => $request->duration
		]);

        return redirect('admin/clients')->with('alert-primary','selamat, Data berhasil diupdate');
    }

    public function detailcli($id)
    {
        return view('admin.detailcli');
    }
}
