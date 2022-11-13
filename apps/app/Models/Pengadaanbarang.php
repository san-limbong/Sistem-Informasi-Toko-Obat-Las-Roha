<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaanbarang extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function karyawan()
    {
        return $this->belongsTo(User::class, 'karyawan_id');
    }
}
