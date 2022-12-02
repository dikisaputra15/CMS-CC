<?php

namespace App\Http\Controllers;

use App\Models\Detail_client;
use App\Models\Note;
use App\Models\Log_note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function addnote($id)
    {
        $dt = Detail_client::find($id);
        return view('admin.addnote', compact(['dt']));
    }

    public function storenote(Request $request)
    {
        Note::create([
            'id_dclient' => $request->id_detail,
            'notes' => $request->notes
        ]);

        Log_note::create([
            'id_dclient' => $request->id_detail,
            'notes' => $request->notes
        ]);

        return redirect('admin/dashboard')->with('alert-primary','Note added');  
    }

    public function editnote(Request $request)
    {
        $id = $request->id_detail;
        DB::table('notes')->where('id_dclient',$id)->update([
            'notes' => $request->notes
        ]);

        Log_note::create([
            'id_dclient' => $id,
            'notes' => $request->notes
        ]);
        
        return redirect('admin/dashboard')->with('alert-primary','Note diupdated');
    }

    public function destroydash(Request $request)
    {
        $id = $request->post('id');

        $empdata = DB::table('detail_clients')->where('id',$id)->delete();

        if($empdata){
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully'; 
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response); 
    }
}
