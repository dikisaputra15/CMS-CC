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
        $invoice = Invoice::all()->sortDesc();
        return view('admin.invoice', compact(['invoice']));
    }

    public function addinvoice()
    {
        return view('admin.addinvoice');
    }

    public function storeinvoice(Request $request)
    {   
        $extension = $request->file('file')->extension();

        $name = $request->file_name;

        $filename = $name. '.' . $extension;

        $request->file('file')->move(
            base_path() . '/public/document/invoice/', $filename
        );

        Invoice::create([
            'invoice_name' => $name,
            'path' => $filename
        ]);

        return redirect('admin/invoice')->with('alert-primary','upload succesfully');
    }

    public function contract()
    {
        $contract = Contract::all()->sortDesc();
        return view('admin.contract', compact(['contract']));
    }

    public function addcontract()
    {
        return view('admin.addcontract');
    }

    public function storecontract(Request $request)
    {   
        $extension = $request->file('file')->extension();

        $name = $request->file_name;

        $filename = $name. '.' . $extension;

        $request->file('file')->move(
            base_path() . '/public/document/contract/', $filename
        );

        Contract::create([
            'contract_name' => $name,
            'path' => $filename
        ]);

        return redirect('admin/contract')->with('alert-primary','upload succesfully');
    }

    public function prop()
    {
        $proposal = Proposal::all()->sortDesc();
        return view('admin.proposal', compact(['proposal']));
    }

    public function addprop()
    {
        return view('admin.addprop');
    }

    public function storeprop(Request $request)
    {   
        $extension = $request->file('file')->extension();

        $name = $request->file_name;

        $filename = $name. '.' . $extension;

        $request->file('file')->move(
            base_path() . '/public/document/proposal/', $filename
        );

        Proposal::create([
            'proposal_name' => $name,
            'path' => $filename
        ]);

        return redirect('admin/prop')->with('alert-primary','upload succesfully');
    }

    public function destroyinv($id)
    {
        $invoice = Invoice::find($id);
        
        if($invoice) {
            $file = public_path('document/invoice/' . $invoice->path);

            if(File::exists($file)) {
                File::delete($file);
            }

            $invoice->delete();

            return redirect()->back()->with('alert-danger','Deleted succesfully');
        }
    
    }

    public function destroyctr($id)
    {
        $ctr = Contract::find($id);
        
        if($ctr) {
            $file = public_path('document/contract/' . $ctr->path);

            if(File::exists($file)) {
                File::delete($file);
            }

            $ctr->delete();

            return redirect()->back()->with('alert-danger','Deleted succesfully');
        }
    
    }

    public function destroyprp($id)
    {
        $prp = Proposal::find($id);
        
        if($prp) {
            $file = public_path('document/proposal/' . $prp->path);

            if(File::exists($file)) {
                File::delete($file);
            }

            $prp->delete();

            return redirect()->back()->with('alert-danger','Deleted succesfully');
        }
    
    }
}
