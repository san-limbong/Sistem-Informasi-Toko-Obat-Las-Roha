<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = "id_detail_transaksi";
    protected $fillable = ['id_header_transaksi','id_barang','hargasatuan','jumlahbarang','totalharga'];

    static function tambah_detail_transaksi($id,$id_header_transaksi,$hargasatuan,$jumlahbarang,$totalharga){
        Detail_transaksi::create([
            "id_barang" => $id,
            "id_header_transaksi" => $id_header_transaksi,
            "hargasatuan" => $hargasatuan,
            "jumlahbarang" => $jumlahbarang,
            "totalharga" => $totalharga,
        ]);
    }



}
