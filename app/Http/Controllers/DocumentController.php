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

    public function destroyinv($id)
    {

        $invoice = Invoice::find($id);

        if($invoice){
            $file = public_path('document/invoice/' . $invoice->path_invoice);

            if(File::exists($file)) {
                File::delete($file);
            }

            $invoice->delete();

        }

        return redirect("admin/$invoice->id_doci/addfile")->with('alert-danger','Deleted succesfully');

    }

    public function destroyctr($id)
    {

        $ctr = Contract::find($id);

        if($ctr){
            $file = public_path('document/contract/' . $ctr->path_contract);

            if(File::exists($file)) {
                File::delete($file);
            }

            $ctr->delete();

        }

        return redirect("admin/$ctr->id_docc/addfile")->with('alert-danger','Deleted succesfully');

    }

    public function destroyprp($id)
    {

        $prp = Proposal::find($id);

        if($prp){
            $file = public_path('document/proposal/' . $prp->path_proposal);

            if(File::exists($file)) {
                File::delete($file);
            }

            $prp->delete();

        }

        return redirect("admin/$prp->id_docp/addfile")->with('alert-danger','Deleted succesfully');

    }

    public function alldoc(Request $request)
    {
        if(request()->ajax()) {

            if($request->from_date)
            {
                $data = DB::table('documents')
                ->join('clients', 'clients.id', '=', 'documents.client_name')
                ->join('services', 'services.id', '=', 'documents.type_of_service')
                ->select('clients.*','services.*','documents.*')
                ->whereBetween('documents.tgl_doc', array($request->from_date, $request->to_date))
                ->get();
            }
            elseif($request->category)
            {
                $data = DB::table('documents')
                ->join('clients', 'clients.id', '=', 'documents.client_name')
                ->join('services', 'services.id', '=', 'documents.type_of_service')
                ->select('clients.*','services.*','documents.*')
                ->where('documents.type_of_service', $request->category)
                ->get();
            }
             else
            {
                $data = DB::table('documents')
                ->join('clients', 'clients.id', '=', 'documents.client_name')
                ->join('services', 'services.id', '=', 'documents.type_of_service')
                ->select('clients.*','services.*','documents.*')
                ->orderBy('documents.id', 'desc')
                ->get();
            }

            return datatables()->of($data)
            ->addColumn('action', function($row){
                 $deleteButton = "<a href='#' class='deleteDoc' data-id='".$row->id."'><i class='fa fa-trash'></i></a>";
                 $docButton = "<a href='/admin/$row->id/addfile' title='Open Documents'><i class='fa fa-folder'></i></a>";
                 $editButton = "<a href='/admin/$row->id/editfile' title='Edit Documents'><i class='fa fa-edit'></i></a>";
                 return $docButton." ".$deleteButton." ".$editButton;
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
                ->orderBy('id', 'desc')
                ->get();
        $ctrs = DB::table('contracts')
                ->where('id_docc', $id)
                ->orderBy('id', 'desc')
                ->get();
        $props = DB::table('proposals')
                ->where('id_docp', $id)
                ->orderBy('id', 'desc')
                ->get();

        return view('admin.addfile', compact(['doc','cli','invs','ctrs','props']));
    }

    public function editfile($id)
    {
        $service = service::all();
        $client = Client::all();
        $doc = Document::find($id);
        return view('admin.editdoc', compact(['service','client','doc']));
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

    public function updatedocident(Request $request)
    {
        $id = $request->id_doc;

        DB::table('documents')->where('id',$id)->update([
			'contract_no' => $request->contract_no,
			'tgl_doc' => $request->tgl_doc,
            'client_name' => $request->client_name,
            'type_of_service' => $request->type_service
		]);

        return redirect('admin/alldoc')->with('alert-primary','Data updated successfully');
    }
}
