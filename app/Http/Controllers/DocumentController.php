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

    public function alldoc(Request $request)
    {
        if(request()->ajax()) {
            if($request->category)
            {
                $data = DB::table('documents')
                ->join('clients', 'clients.id', '=', 'documents.client_name')
                ->join('services', 'services.id', '=', 'documents.type_of_service')
                ->select('clients.*','services.*','documents.*')
                ->where('documents.type_of_service', $request->category)
                ->get();
            }else{
                $data = DB::table('documents')
                ->join('clients', 'clients.id', '=', 'documents.client_name')
                ->join('services', 'services.id', '=', 'documents.type_of_service')
                ->select('clients.*','services.*','documents.*')
                ->get();
            }
            return datatables()->of($data)
            ->addColumn('action', function($row){
                 $deleteButton = "<a href='#' class='deleteDoc' data-id='".$row->id."'><i class='fa fa-trash'></i></a>";
                 $docButton = "<a href='/admin/$row->id/addfile' title='Open Documents'><i class='fa fa-folder'></i></a>";
                 return $docButton." ".$deleteButton;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $service = Service::all();
        return view('admin.alldoc', compact(['service']));
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
        $id_cli = $doc->client_name;
        $cli = Client::find($id_cli);
        $invs = DB::table('invoices')
                ->where('id_doci', $id)
                ->get();
        $ctrs = DB::table('contracts')
                ->where('id_docc', $id)
                ->get();
        $props = DB::table('proposals')
                ->where('id_docp', $id)
                ->get();
        
        return view('admin.addfile', compact(['doc','cli','invs','ctrs','props']));
    }

    public function storefile(Request $request)
    {
        $type = $request->file_type;
        if($type == 1){

            $extension = $request->file('file')->extension();

            $nama_file = str_replace(" ", "-", $request->file_name);
            $num = hexdec(uniqid());

            $filename = $nama_file.'_'.$num.'.'.$extension;

            $request->file('file')->move(
                base_path() . '/public/document/invoice/', $filename
            );

            Invoice::create([
                'id_doci' => $request->id_doc,
                'path_invoice' => $filename
            ]);

            return redirect("admin/$request->id_doc/addfile")->with('alert-primary','upload succesfully');

        }elseif($type == 2){
            $extension = $request->file('file')->extension();

            $nama_file = str_replace(" ", "-", $request->file_name);
            $num = hexdec(uniqid());

            $filename = $nama_file.'_'.$num.'.'.$extension;

            $request->file('file')->move(
                base_path() . '/public/document/contract/', $filename
            );

            Contract::create([
                'id_docc' => $request->id_doc,
                'path_contract' => $filename
            ]);

            return redirect("admin/$request->id_doc/addfile")->with('alert-primary','upload succesfully');

        }elseif($type == 3){

            $extension = $request->file('file')->extension();

            $nama_file = str_replace(" ", "-", $request->file_name);
            $num = hexdec(uniqid());

            $filename = $nama_file.'_'.$num.'.'.$extension;

            $request->file('file')->move(
                base_path() . '/public/document/proposal/', $filename
            );

            Proposal::create([
                'id_docp' => $request->id_doc,
                'path_proposal' => $filename
            ]);

            return redirect("admin/$request->id_doc/addfile")->with('alert-primary','upload succesfully');

        }else{
            return redirect("admin/$request->id_doc/addfile")->with('alert-danger','please choose file type');
        }
    }

    public function destroydoc(Request $request)
    {
        $id = $request->post('id');

        $doc = Document::find($id);

        if($doc){
            $doc->delete();
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully'; 
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response); 
    
    }
}
