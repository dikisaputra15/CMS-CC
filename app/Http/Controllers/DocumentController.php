<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Contract;
use App\Models\Proposal;
use App\Models\Service;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function invoice()
    {
        $data = DB::table('invoices')
                ->join('clients', 'invoices.client_name', '=', 'clients.id')
                ->join('services', 'invoices.type_of_service', '=', 'services.id')
                ->select('clients.*', 'services.*', 'invoices.*')
                ->get();

        if(request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('action', function($row){
                 $deleteButton = "<a href='#' class='deleteInvoice' data-id='".$row->id."'><i class='fa fa-trash'></i></a>";
                 return $deleteButton;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.invoice');
    }

    public function addinvoice()
    {
        $service = service::all();
        $client = Client::all();
        return view('admin.addinvoice', compact(['service','client']));
    }

    public function storeinvoice(Request $request)
    {   
        $extension = $request->file('file')->extension();

        $nama_file = str_replace(" ", "-", $request->file_name);
        $num = hexdec(uniqid());

        $filename = $nama_file.'_'.$num.'.'.$extension;

        $request->file('file')->move(
            base_path() . '/public/document/invoice/', $filename
        );

        Invoice::create([
            'contract_no' => $request->contract_no,
            'client_name' => $request->client_name,
            'type_of_service' => $request->type_service,
            'path' => $filename,
            'tgl_invoice' => $request->tgl_invoice
        ]);

        return redirect('admin/invoice')->with('alert-primary','upload succesfully');
    }

    public function contract()
    {
        $data = DB::table('contracts')
                ->join('clients', 'contracts.client_name', '=', 'clients.id')
                ->join('services', 'contracts.type_of_service', '=', 'services.id')
                ->select('clients.*', 'services.*', 'contracts.*')
                ->get();

        if(request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('action', function($row){
                 $deleteButton = "<a href='#' class='deleteContract' data-id='".$row->id."'><i class='fa fa-trash'></i></a>";
                 return $deleteButton;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.contract');
    }

    public function addcontract()
    {
        $service = service::all();
        $client = Client::all();
        return view('admin.addcontract', compact(['service','client']));
    }

    public function storecontract(Request $request)
    {   
        $extension = $request->file('file')->extension();

        $nama_file = str_replace(" ", "-", $request->file_name);
        $num = hexdec(uniqid());

        $filename = $nama_file.'_'.$num.'.'.$extension;

        $request->file('file')->move(
            base_path() . '/public/document/contract/', $filename
        );

        Contract::create([
            'contract_no' => $request->contract_no,
            'client_name' => $request->client_name,
            'type_of_service' => $request->type_service,
            'path' => $filename,
            'tgl_contract' => $request->tgl_contract
        ]);

        return redirect('admin/contract')->with('alert-primary','upload succesfully');
    }

    public function prop()
    {
        $data = DB::table('proposals')
        ->join('clients', 'proposals.client_name', '=', 'clients.id')
        ->join('services', 'proposals.type_of_service', '=', 'services.id')
        ->select('clients.*', 'services.*', 'proposals.*')
        ->get();

        if(request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('action', function($row){
                 $deleteButton = "<a href='#' class='deleteProposal' data-id='".$row->id."'><i class='fa fa-trash'></i></a>";
                 return $deleteButton;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.proposal');
    }

    public function addprop()
    {
        $service = service::all();
        $client = Client::all();
        return view('admin.addprop', compact(['service','client']));
    }

    public function storeprop(Request $request)
    {   
        $extension = $request->file('file')->extension();

        $nama_file = str_replace(" ", "-", $request->file_name);
        $num = hexdec(uniqid());

        $filename = $nama_file.'_'.$num.'.'.$extension;

        $request->file('file')->move(
            base_path() . '/public/document/proposal/', $filename
        );

        Proposal::create([
            'contract_no' => $request->contract_no,
            'client_name' => $request->client_name,
            'type_of_service' => $request->type_service,
            'path' => $filename,
            'tgl_proposal' => $request->tgl_proposal
        ]);

        return redirect('admin/prop')->with('alert-primary','upload succesfully');
    }

    public function destroyinv(Request $request)
    {
        $id = $request->post('id');

        $invoice = Invoice::find($id);

        if($invoice){
            $file = public_path('document/invoice/' . $invoice->path);

            if(File::exists($file)) {
                File::delete($file);
            }

            $invoice->delete();

            $response['success'] = 1;
            $response['msg'] = 'Delete successfully'; 
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response); 
    
    }

    public function destroyctr(Request $request)
    {   
        $id = $request->post('id');

        $ctr = Contract::find($id);

        if($ctr){
            $file = public_path('document/contract/' . $ctr->path);

            if(File::exists($file)) {
                File::delete($file);
            }

            $ctr->delete();

            $response['success'] = 1;
            $response['msg'] = 'Delete successfully'; 
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response); 
    
    }

    public function destroyprp(Request $request)
    {
        $id = $request->post('id');

        $prp = Proposal::find($id);

        if($prp){
            $file = public_path('document/proposal/' . $prp->path);

            if(File::exists($file)) {
                File::delete($file);
            }

            $prp->delete();

            $response['success'] = 1;
            $response['msg'] = 'Delete successfully'; 
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response); 
    
    }
}
