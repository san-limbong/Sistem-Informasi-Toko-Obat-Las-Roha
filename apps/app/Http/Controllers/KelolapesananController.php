<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Header_transaksi;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Validator;

class KelolapesananController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $transaksi = Header_transaksi::where('id_header_transaksi', 'LIKE', '%' . $request->search . '%')
                ->orWhere('customer_id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('status', 'LIKE', '%' . $request->search . '%')
                ->paginate(5);
            $transaksi->appends($request->all());
        } else {
            $transaksi = Header_transaksi::latest()->paginate(5);
        }
        return view('pengelolatoko.kelolapesanan.index', ['title' => 'Transaksi', 'active' => 'transaksi'], compact('transaksi'));
    }

    public function show($id_header_transaksi)
    {
        $transaksi = DB::table('header_transaksis')
            ->join('detail_transaksis', 'header_transaksis.id_header_transaksi', '=', 'detail_transaksis.id_header_transaksi')
            ->join('barangs', 'detail_transaksis.id_barang', '=', 'barangs.id')
            ->join('users', 'header_transaksis.customer_id', '=', 'users.id')
            ->where('detail_transaksis.id_header_transaksi', $id_header_transaksi)
            ->get();
        return view('pengelolatoko.kelolapesanan.show', ['title' => 'Lihat Detail Transaksi', 'active' => 'transaksi'], compact('transaksi'));
    }

    public function edit($id_header_transaksi)
    {
        $transaksi = DB::table('header_transaksis')
            ->join('detail_transaksis', 'header_transaksis.id_header_transaksi', '=', 'detail_transaksis.id_header_transaksi')
            ->join('barangs', 'detail_transaksis.id_barang', '=', 'barangs.id')
            ->join('users', 'header_transaksis.customer_id', '=', 'users.id')
            ->where('detail_transaksis.id_header_transaksi', $id_header_transaksi)
            ->get();
        return view('pengelolatoko.kelolapesanan.edit', ['title' => 'Edit Status', 'active' => 'transaksi'], compact('transaksi'));
    }

    public function update(Request $request, $id_header_transaksi)
    {

        $validator = Validator::make($request->all(), [
            'status' =>'required|in:Diterima,Dibatalkan',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $transaksi = Header_transaksi::findOrFail($id_header_transaksi);
        $transaksi->status = $request->status;
        $transaksi->save();
        return redirect('/datapesanan')->with('success', 'Pesanan telah di update!');
    }
    public function remove($id_header_transaksi)
    {
        $transaksi = Header_transaksi::findOrFail($id_header_transaksi);
        $transaksi->delete();
        return redirect('/datapesanan')->with('warning', 'Pesanan telah dipindahkan ke keranjang sampah!');
    }
    public function keranjangsampah()
    {
        $transaksi = Header_transaksi::onlyTrashed()->paginate(5);
        return view('pengelolatoko.kelolapesanan.trashbin', ['title' => 'Keranjang Sampah', 'active' => 'transaksi'], compact('transaksi'));
    }

    public function restore($id_header_transaksi)
    {
        Header_transaksi::where('id_header_transaksi', $id_header_transaksi)->withTrashed()->restore();
        return redirect('/datapesanan')->with('primary', 'Pesanan telah dipulihkan!');
    }

    public function destroy($id_header_transaksi)
    {
        $transaksi = Header_transaksi::onlyTrashed()->where('id_header_transaksi', $id_header_transaksi);
        $transaksi->forceDelete();
        return redirect('/datapesanan/trashbin')->with('danger', 'Pesanan telah dihapus!');
    }

    public function pulihkan()
    {
        $transaksi = Header_transaksi::onlyTrashed();
        $transaksi->restore();
        return redirect('/datapesanan/trashbin')->with('success', 'Semua pesanan telah dipulihkan!');
    }

    public function invoice($id_header_transaksi)
    {
        $transaksi = DB::table('header_transaksis')
        ->join('detail_transaksis', 'header_transaksis.id_header_transaksi', '=', 'detail_transaksis.id_header_transaksi')
        ->join('barangs', 'detail_transaksis.id_barang', '=', 'barangs.id')
        ->join('users', 'header_transaksis.customer_id', '=', 'users.id')
        ->where('detail_transaksis.id_header_transaksi', $id_header_transaksi)
        ->get();
        // return view('pembeli.unduh',['title' => 'Products', 'active' => 'cart'],compact('transaksi'));

        view()->share('transaksi', $transaksi);
        $pdf = PDF::loadview('pengelolatoko.kelolapesanan.unduh');
        return $pdf->download('invoice.pdf');
        
    }  
}
