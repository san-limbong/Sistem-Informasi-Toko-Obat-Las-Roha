<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Header_transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = "id_header_transaksi";
    protected $guarded = ['id_header_transaksi'];
    protected $dates = ['deleted_at'];

    static function tambah_header_transaksi($customer_id){
        $data = Header_transaksi::create([
            "tanggal_transaksi" => date("Y-m-d"),
            "customer_id" => $customer_id,
        ]);
        return $data->id_header_transaksi;
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

}
