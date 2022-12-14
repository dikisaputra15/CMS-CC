<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Datatables;

class ServiceController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Service::select('*'))
            ->addColumn('action', function($row){
                 $updateButton = "<a href='/admin/$row->id/editsrv' title='Edit'><i class='fa fa-edit'></i></a>";
                 $deleteButton = "<a href='#' class='deleteService' data-id='".$row->id."'><i class='fa fa-trash'></i></a>";
                 return $updateButton." ".$deleteButton;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.service');
    }

    public function addservice()
    {
        return view('admin.addservice');
    }

    public function storesrv(Request $request)
    {

        service::create([
            'kode_services' => $request->kode_services,
            'nama_services' => $request->nama_services
        ]);

        return redirect('admin/services')->with('alert-primary','Data added successfully');
       
    }

    public function editsrv($id)
    {
        $service = service::find($id);
        return view('admin.editsrv', compact(['service']));
    }

    public function updatesrv($id, Request $request)
    {
        DB::table('services')->where('id',$id)->update([
			'kode_services' => $request->kode_services,
			'nama_services' => $request->nama_services
		]);

        return redirect('admin/services')->with('alert-primary','Data updated successfully');
    }

    public function destroysrv(Request $request)
    {
        
        $id = $request->post('id');

        $empdata = Service::find($id);

        if($empdata->delete()){
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully'; 
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response); 
    }
}
