<?php

namespace App\Http\Controllers;

use App\Models\Detail_client;
use App\Models\Note;
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

        return redirect('admin/dashboard')->with('alert-primary','Note berhasil dibuat');  
    }

    public function editnote($id)
    {
        $note = Note::find($id);
        return view('admin.editnote', compact(['note']));
    }

    public function updatenote($id, Request $request)
    {
        DB::table('notes')->where('id',$id)->update([
			'notes' => $request->notes
		]);

        return redirect('admin/dashboard')->with('alert-primary','Note berhasil diupdate');
    }
}
