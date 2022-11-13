<?php

namespace App\Http\Controllers;

use App\Models\Draftbarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DraftbarangController extends Controller
{

    public function index()
    {
        $draft = Draftbarang::all();
        return view('pengelolatoko.draftbarang.index',[
            'active' => 'penerimaanbarang',
            'title' => 'Penerimaan Barang',
        ],compact('draft'));
    }


    public function create()
    {
        return view('pengelolatoko.draftbarang.create',[
            'active' => 'penerimaanbarang',
            'title' => 'Tambah Penerimaan Barang',
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect('/draftbarang/tambah')
                ->withErrors($validator)
                ->withInput();
        }

        $draft = new Draftbarang();
        $file = $request->file;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $draft->file = $filename;
        $draft->save();
        return redirect('/draftbarang')->with('success', 'Draft barang telah ditambah');
    }

    
    public function show($id)
    {
        $data=Draftbarang::findorfail($id);
        return view('pengelolatoko.draftbarang.show',compact('data'));
    }

    public function destroy($id)
    {
        $draft = Draftbarang::findOrFail($id);
        $draft->delete();
        return redirect('/draftbarang')->with('danger', 'Draft Barang telah dihapus');
    }
}
