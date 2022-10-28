<?php

namespace App\Http\Controllers;

use App\Models\Prospective_client;
use App\Models\Detail_propective_client;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProspecController extends Controller
{
    public function index()
    {
        $prospec = Prospective_client::all();
        return view('admin.prospective', compact(['prospec']));
    }

    public function addprospec()
    {
        return view('admin.addprospec');
    }

    public function storeprospec(Request $request)
    {
       $prospective = prospective_client::create([
            'nama_client' => $request->client_name,
            'client_poc' => $request->client_poc,
            'poc_cc' => $request->poc_cc
        ]);

        $prospectiveid = $prospective->id;

        detail_propective_client::create([
            'id_pros_client' => $prospectiveid,
            'date' => $request->tgl,
            'remarks' => $request->remark
        ]);

        return redirect('admin/prospective')->with('alert-primary','selamat, Data berhasil ditambah');
    }

    public function addupdate($id)
    {
        $prospec = Prospective_client::find($id);
        return view('admin.updatepros', compact(['prospec']));
    }

    public function updatepros(Request $request)
    {
        detail_propective_client::create([
            'id_pros_client' => $request->id_prospective,
            'date' => $request->tgl,
            'remarks' => $request->remark
        ]);

        return redirect('admin/'."{$request->id_prospective}".'/detailpros')->with('alert-primary','selamat, Data berhasil diupdate');
    }

    public function detailpros($id)
    {
        $detail = DB::table('prospective_clients')
                    ->join('detail_propective_clients', 'prospective_clients.id', '=', 'detail_propective_clients.id_pros_client')
                    ->select('prospective_clients.*', 'detail_propective_clients.date', 'detail_propective_clients.remarks')
                    ->where('prospective_clients.id', $id)
                    ->get();
        return view('admin.detailpros', compact(['detail']));
    }

    public function destroypros($id)
    {
        $prospec = Prospective_client::find($id);
        $prospec->delete();
        return redirect('admin/prospective')->with('alert-danger','selamat, Data berhasil dihapus');
    }

}
