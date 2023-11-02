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
        $prospec = DB::table('detail_propective_clients')
        ->join('prospective_clients', 'detail_propective_clients.id_pros_client', '=', 'prospective_clients.id')
        ->select('prospective_clients.*', 'detail_propective_clients.*')
        ->orderBy('detail_propective_clients.id_pros_client', 'desc')
        ->get();

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
            'poc_cc' => $request->poc_cc
        ]);

        $prospectiveid = $prospective->id;

        detail_propective_client::create([
            'id_pros_client' => $prospectiveid,
            'date' => $request->tgl,
            'remarks' => $request->remark,
            'client_poc' => $request->client_poc
        ]);

        return redirect('admin/prospective')->with('alert-primary','Data added successfully');
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
            'client_poc' => $request->client_poc
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
        DB::table('detail_propective_clients')->where('id',$id)->delete();
        return redirect('admin/prospective')->with('alert-danger','Data Deleted');
    }

    public function editpros($id)
    {
        $prospec = detail_propective_client::find($id);
        $id_prospec = $prospec->id_pros_client;
        $client = prospective_client::find($id_prospec);
        return view('admin.editpros', compact(['prospec','client']));
    }

    public function prosesupdatepros($id, Request $request)
    {
        $id_client = $request->id_client;

        DB::table('detail_propective_clients')->where('id',$id)->update([
			'id_pros_client' => $id_client,
			'date' => $request->tgl,
            'remarks' => $request->remark,
            'client_poc' => $request->client_poc
		]);

        DB::table('prospective_clients')->where('id',$id_client)->update([
			'nama_client' => $request->client_name,
			'poc_cc' => $request->poc_cc
		]);

        return redirect('admin/prospective')->with('alert-primary','Data updated successfully');
    }

}
