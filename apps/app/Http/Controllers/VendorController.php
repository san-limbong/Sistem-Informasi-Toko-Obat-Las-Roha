<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use CreateBarangsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class VendorController extends Controller
{
    public function index()
    {
        return view('pengelolatoko.vendor.index', [
            'active'=> 'vendor',
            'title' => 'Vendor',
            'barang' => Barang::all(),
        ]);
    }
}
