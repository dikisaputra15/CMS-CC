<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Contract;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function invoice()
    {
        if(request()->ajax()) {
            return datatables()->of(Invoice::select('*'))
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
        return view('admin.addinvoice');
    }

    public function storeinvoice(Request $request)
    {   
        $extension = $request->file('file')->extension();

        $contract = $request->contract_no;
        $client = str_replace(" ", "-", $request->client_name);
        $type = str_replace(" ", "-", $request->type_service);

        $filename = $contract.'_'.$client.'_'.$type.'.'.$extension;

        $request->file('file')->move(
            base_path() . '/public/document/invoice/', $filename
        );

        Invoice::create([
            'contract_no' => $contract,
            'client_name' => $request->client_name,
            'type_of_service' => $request->type_service,
            'path' => $filename
        ]);

        return redirect('admin/invoice')->with('alert-primary','upload succesfully');
    }

    public function contract()
    {
        if(request()->ajax()) {
            return datatables()->of(Contract::select('*'))
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
        return view('admin.addcontract');
    }

    public function storecontract(Request $request)
    {   
        $extension = $request->file('file')->extension();

        $contract = $request->contract_no;
        $client = str_replace(" ", "-", $request->client_name);
        $type = str_replace(" ", "-", $request->type_service);

        $filename = $contract.'_'.$client.'_'.$type.'.'.$extension;

        $request->file('file')->move(
            base_path() . '/public/document/contract/', $filename
        );

        Contract::create([
            'contract_no' => $contract,
            'client_name' => $request->client_name,
            'type_of_service' => $request->type_service,
            'path' => $filename
        ]);

        return redirect('admin/contract')->with('alert-primary','upload succesfully');
    }

    public function prop()
    {
        if(request()->ajax()) {
            return datatables()->of(Proposal::select('*'))
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
        return view('admin.addprop');
    }

    public function storeprop(Request $request)
    {   
        $extension = $request->file('file')->extension();

        $contract = $request->contract_no;
        $client = str_replace(" ", "-", $request->client_name);
        $type = str_replace(" ", "-", $request->type_service);

        $filename = $contract.'_'.$client.'_'.$type.'.'.$extension;

        $request->file('file')->move(
            base_path() . '/public/document/proposal/', $filename
        );

        Proposal::create([
            'contract_no' => $contract,
            'client_name' => $request->client_name,
            'type_of_service' => $request->type_service,
            'path' => $filename
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
