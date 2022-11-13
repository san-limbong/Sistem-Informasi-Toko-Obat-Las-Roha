<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Detail_transaksi;
use App\Models\Header_transaksi;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;


class CartController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $barang = Barang::where('id','LIKE','%' .$request->search.'%')
            ->orWhere('name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('merek', 'LIKE', '%' . $request->search . '%')
            ->orWhere('harga', 'LIKE', '%' . $request->search . '%')
            ->paginate(5);
            $barang->appends($request->all());
        }
        else{
            $barang = Barang::paginate(8);
        }  
        return view('pembeli.layanan.index',['title' => 'Products', 'active' => 'products'],compact('barang'));
    }

    public function cart()
    {
        $cart = session("cart");
        return view('pembeli.cart',['title' => 'Products', 'active' => 'cart'],compact('cart'));
    }


    public function addtocart($id){

        $cart = session("cart");
        $barang = Barang::detail_barang($id);
        $cart[$id] = [
            "name" => $barang->name,
            "harga" => $barang->harga,
            "jumlah" => 1
        ];
        session(["cart" => $cart]);
        return redirect("/cart");
    }

    public function update(Request $request, $id){
        $request->validate([
            'jumlah' =>'required|numeric',
        ]);

        $cart = session("cart");
        $barang = Barang::detail_barang($id);
        $cart[$id] = [
            "name" => $barang->name,
            "harga" => $barang->harga,
            "jumlah" => $request->jumlah
        ];
        session(["cart" => $cart]);
        return redirect("/cart");
    }

    public function remove($id){
        $cart = session("cart");
        unset($cart[$id]);
        session(["cart" => $cart]);
        return redirect("/cart");
    }

    public function destroy(){
        $cart = session("cart");
        session()->forget("cart");
        return redirect("/cart");
    }

    public function checkout(Request $request){
        $cart = session("cart");
        if(empty($cart)){
            return redirect("/cart");
        }

        $customer_id = Auth()->user()->id;
        $id_header_transaksi = Header_transaksi::tambah_header_transaksi($customer_id);
        if (is_array($cart) || is_object($cart))
        {
            foreach($cart as $ct => $val){
                $id = $ct;
                $hargasatuan = $val["harga"];
                $jumlahbarang = $val["jumlah"];
                $totalharga = $request->totalharga;
                Detail_transaksi::tambah_detail_transaksi($id,$id_header_transaksi,$hargasatuan,$jumlahbarang,$totalharga);
                $barang = Barang::findorfail($id);
                $barang->decrement('stok', $jumlahbarang);
            }
        }
        session()->forget("cart");

        $transaksi = DB::table('header_transaksis')
        ->join('detail_transaksis', 'header_transaksis.id_header_transaksi', '=', 'detail_transaksis.id_header_transaksi')
        ->join('barangs', 'detail_transaksis.id_barang', '=', 'barangs.id')
        ->join('users', 'header_transaksis.customer_id', '=', 'users.id')
        ->where('detail_transaksis.id_header_transaksi', $id_header_transaksi)
        ->get();

        return view('pembeli.invoice',['title' => 'Products', 'active' => 'cart'],compact('transaksi'));
    }

    public function invoice($id_header_transaksi)
    {
        $transaksi = DB::table('header_transaksis')
        ->join('detail_transaksis', 'header_transaksis.id_header_transaksi', '=', 'detail_transaksis.id_header_transaksi')
        ->join('barangs', 'detail_transaksis.id_barang', '=', 'barangs.id')
        ->join('users', 'header_transaksis.customer_id', '=', 'users.id')
        ->where('detail_transaksis.id_header_transaksi', $id_header_transaksi)
        ->get();
        view()->share('transaksi', $transaksi);
        $pdf = PDF::loadview('pembeli.unduh');
        return $pdf->download('invoice.pdf');

    }   
}
