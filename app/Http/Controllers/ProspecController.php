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
            'date_pro' => $request->tgl,
            'remarks_pro' => $request->remark,
            'client_poc_pro' => $request->client_poc,
            'poc_cc_pro' => $request->poc_cc
        ]);

        $prospectiveid = $prospective->id;

        detail_propective_client::create([
            'id_pros_client' => $prospectiveid,
            'date' => $request->tgl,
            'remarks' => $request->remark,
            'client_poc' => $request->client_poc,
            'poc_cc' => $request->poc_cc
        ]);

        return redirect('admin/prospective')->with('alert-primary','Data berhasil ditambah');
    }

    public function addupdate($id)
    {
        $prospec = Prospective_client::find($id);
        return view('admin.updatepros', compact(['prospec']));
    }

    public function updatepros(Request $request)
    {
        $id = $request->id_prospective;
        
        detail_propective_client::create([
            'id_pros_client' => $id,
            'date' => $request->tgl,
            'remarks' => $request->remark,
            'client_poc' => $request->client_poc,
            'poc_cc' => $request->poc_cc
        ]);

        DB::table('prospective_clients')->where('id',$id)->update([
            'date_pro' => $request->tgl,
            'remarks_pro' => $request->remark,
            'client_poc_pro' => $request->client_poc,
            'poc_cc_pro' => $request->poc_cc
		]);

        return redirect('admin/prospective')->with('alert-primary','update success');
    }

    public function detailpros($id)
    {
        $detail = DB::table('prospective_clients')
                    ->join('detail_propective_clients', 'prospective_clients.id', '=', 'detail_propective_clients.id_pros_client')
                    ->select('detail_propective_clients.*', 'prospective_clients.*')
                    ->where('prospective_clients.id', $id)
                    ->get();
        return view('admin.detailpros', compact(['detail']));
    }

    public function destroypros($id)
    {
        DB::table('prospective_clients')->where('id',$id)->delete();
        DB::table('detail_propective_clients')->where('id_pros_client',$id)->delete();
        return redirect('admin/prospective')->with('alert-danger','selamat, Data berhasil dihapus');
    }

}
