<?php

namespace App\Http\Controllers;

use App\Models\Pengadaanbarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengadaanbarangController extends Controller
{

    public function index()
    {
        $pengadaan = Pengadaanbarang::all();
        return view('pengelolatoko.pengadaanbarang.index',['title' => 'Pengadaan Barang', 'active'=> 'pengadaanbarang'], compact('pengadaan'));
    }

    public function create()
    {
        return view('pengelolatoko.pengadaanbarang.create',[
            'title' => 'Ajukan Pengadaan Barang', 
            'active'=> 'pengadaanbarang']);
   
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect('/pengadaanbarang/tambah')
                ->withErrors($validator)
                ->withInput();
        }

        $pengadaan = new Pengadaanbarang();
        $file = $request->file;
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $request->file->move('assets', $filename);
        $pengadaan->file = $filename;
        $pengadaan->karyawan_id = auth()->user()->id;
        $pengadaan->save();
        return redirect('/pengadaanbarang')->with('success', 'Pengajuan barang telah disimpan');
    }


    public function show($id)
    {
        $data=Pengadaanbarang::findorfail($id);
        return view('pengelolatoko.pengadaanbarang.show',compact('data'));
    }


    public function edit($id)
    {
        $pengadaan=Pengadaanbarang::findorfail($id);
        return view('pengelolatoko.pengadaanbarang.edit',[
            'title' => 'Review Pengadaan Barang', 
            'active'=> 'pengadaanbarang'
        ],compact('pengadaan'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' =>'required|in:Diterima,Dibatalkan',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pengadaanbarang::findOrFail($id);
        $data->status = $request->status;
        $data->save();
        return redirect('/pengadaanbarang')->with('primary', 'Pengajuan Barang telah direview!');
    }

    public function destroy($id)
    {
        $pengadaan = Pengadaanbarang::findOrFail($id);
        $pengadaan->delete();
        return redirect('/pengadaanbarang')->with('danger', 'Pengajuan Barang telah dihapus');
    }
}
