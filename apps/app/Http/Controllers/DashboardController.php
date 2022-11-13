<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Header_transaksi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $vendor = DB::table('barangs')->distinct()->get(['vendor']);
        $transaksi = Header_transaksi::all();
        $karyawan = User::where('role',2)->count();
        $customer = User::where('role',3)->count();

        $databarang = Barang::orderBy('updated_at', 'DESC')->get();
        $chartbarang = [];
        foreach($databarang as $barang) {
            $chartbarang[] = array($barang['name'], $barang['stok']); 
        }

        $users = User::select(DB::raw("COUNT(*) as count"))
                    ->where('role', 3)
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Day(created_at)"))
                    ->pluck('count');

        return view('pengelolatoko.dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'databarang' => $databarang, 
            'chartbarang' => json_encode($chartbarang),

        ], compact('vendor','transaksi','karyawan','customer','users'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
