<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Contract;
use App\Models\Proposal;
use App\Models\Service;
use App\Models\Client;
use App\Models\Document;
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
            'path_invoice' => $filename,
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
            'path_contract' => $filename,
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
            'path_proposal' => $filename,
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

    public function alldoc()
    {
        $data = DB::table('documents')
        ->leftjoin('clients', 'clients.id', '=', 'documents.client_name')
        ->leftjoin('services', 'services.id', '=', 'documents.type_of_service')
        ->leftjoin('contracts', 'contracts.id_docc', '=', 'documents.id')
        ->leftjoin('proposals', 'proposals.id_docp', '=', 'documents.id')
        ->leftjoin('invoices', 'invoices.id_doci', '=', 'documents.id')
        ->select('invoices.*', 'proposals.*', 'contracts.*','clients.*','services.*','documents.*')
        ->get();

        if(request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('action', function($row){
                 $deleteButton = "<a href='#' class='deleteDoc' data-id='".$row->id."'><i class='fa fa-trash'></i></a>";
                 $docButton = "<a href='/admin/$row->id/addfile' title='Add File'><i class='fa fa-folder'></i></a>";
                 return $docButton." ".$deleteButton;
            })
            ->addColumn('invoice', function($row){
                if($row->path_invoice == null){
                    $invoice = "no document";
                }else{
                    $invoice = "<a href='/document/invoice/$row->path_invoice' target='__blank'>$row->path_invoice</a>";
                }
                return $invoice;
           })
           ->addColumn('contract', function($row){
                if($row->path_contract == null){
                    $contract = "no document";
                }else{
                    $contract = "<a href='/document/contract/$row->path_contract' target='__blank'>$row->path_contract</a>";
                }
                return $contract;
            })
            ->addColumn('proposal', function($row){
                if($row->path_proposal == null){
                    $proposal = "no document";
                }else{
                    $proposal = "<a href='/document/proposal/$row->path_proposal' target='__blank'>$row->path_proposal</a>";
                }
                return $proposal;
            })
            ->rawColumns(['action','invoice','contract','proposal'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('admin.alldoc');
    }

    public function adddoc()
    {
        $service = service::all();
        $client = Client::all();
        return view('admin.adddoc', compact(['service','client']));
    }

    public function storedoc(Request $request)
    {
         Document::create([
            'contract_no' => $request->contract_no,
            'tgl_doc' => $request->tgl_doc,
            'client_name' => $request->client_name,
            'type_of_service' => $request->type_service
        ]);

        return redirect('admin/alldoc')->with('alert-primary','added succesfully');
    }

    public function addfile($id)
    {
        $doc = Document::find($id);
        return view('admin.addfile', compact(['doc']));
    }

    public function storefile(Request $request)
    {
        $type = $request->file_type;
        if($type == 1){

        }elseif($type == 2){

        }elseif($type == 3){

        }else{
            return redirect('admin/alldoc')->with('alert-danger','please choose file type');
        }
    }
}
