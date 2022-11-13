<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Barryvdh\DomPDF\Facade\PDF;
class RencanaControlller extends Controller
{
    public function index()
    {   
        $cartt = session("cartt"); 
        
        
        return view('pengelolatoko.perencanaanbarang.produk',['title' => 'Rencanan Pengadaan',  'barang' => Barang::all(),'active'=> 'rencanapengadaan'],compact('cartt'));   
    }
    public function stor1(Request $request)
    {
        $validatedData = $request->validate([
            'jumlahrencana' => 'required',
        ]);

        $Rencana = new Rencana;
        $Rencana->jumlah = $request->jumlah;
        $Rencana->save();
        return redirect('/ucok')->with('success', 'Barang Anda Berhasil Ditambahkan!');       
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jumlahrencana' => 'required',
        ]);
        $barang = new Barang;
        $barang->jumlahrencana = $request->jumlahrencana;
        $barang->save();
        return redirect('/ucok')->with('success', 'Barang Anda Berhasil Ditambahkan!');
    }
    public function edit(Request $request, $id)
    {
        $bar = Barang::findorfail($id);
        return view('pengelolatoko.perencanaanbarang.ubahstokrencana', compact('bar'), [ 
            'title' => 'Ubah Rencana Pengadaan', 
            'active'=> 'rencanapengadaan'
        ]);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jumlahrencana' => 'required',
        ]);
        $barang = Barang::find($id);
        $barang->jumlahrencana = $request->input('jumlahrencana');
        $barang->save();
        return redirect('/rencanapengadaan')->with('success', 'Jumlah Rencana pengadaan barang Berhasil di Update!');
    }
    public function outofstock(){
        $barang = Barang::onlyTrashed()->get();
        view()->share('barang', $barang);
        $pdf = PDF::loadview('pengelolatoko.perencanaanbarang.outofstock');
        return $pdf->download('Rencana Pengadaan Barang.pdf');
    }
    

}
