<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Header_transaksi;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class LayananController extends Controller
{
    public function daftarharga(Request $request){

        if($request->has('search')){
            $barang = Barang::where('id','LIKE','%' .$request->search.'%')
            ->orWhere('name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('merek', 'LIKE', '%' . $request->search . '%')
            ->orWhere('harga', 'LIKE', '%' . $request->search . '%')
            ->paginate(5);
            $barang->appends($request->all());
        }
        else{
            $barang = Barang::paginate(5);
        }  
        return view('pembeli.daftarharga.index',['title' => 'Price List', 'active' => 'pricelist'],compact('barang'));
    }

    public function index()
    {   
        $transaksi = Header_transaksi::where('customer_id', auth()->user()->id)->latest()->paginate(5);
        return view('pembeli.layanan.history',['title' => 'Purchase History', 'active' => 'purchasehistory'],compact('transaksi'));
    }

    public function show($id_header_transaksi)
    {
        $transaksi = DB::table('header_transaksis')
            ->join('detail_transaksis', 'header_transaksis.id_header_transaksi', '=', 'detail_transaksis.id_header_transaksi')
            ->join('barangs', 'detail_transaksis.id_barang', '=', 'barangs.id')
            ->join('users', 'header_transaksis.customer_id', '=', 'users.id')
            ->where('detail_transaksis.id_header_transaksi', $id_header_transaksi)
            ->get();
        return view('pembeli.layanan.show', ['title' => 'Purchase History', 'active' => 'purchasehistory'], compact('transaksi'));
    }

    public function riwayat($id_header_transaksi)
    {
        $transaksi = DB::table('header_transaksis')
        ->join('detail_transaksis', 'header_transaksis.id_header_transaksi', '=', 'detail_transaksis.id_header_transaksi')
        ->join('barangs', 'detail_transaksis.id_barang', '=', 'barangs.id')
        ->join('users', 'header_transaksis.customer_id', '=', 'users.id')
        ->where('detail_transaksis.id_header_transaksi', $id_header_transaksi)
        ->get();

        view()->share('transaksi', $transaksi);
        $pdf = PDF::loadview('pembeli.layanan.unduh');
        return $pdf->download('receipt.pdf');
        
    } 
}
