<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use HasFactory,Notifiable;
    protected $guarded = ['id'];

    protected $fillable = [
        'name',   
    ];
    public function users()
    {
        return $this->hasMany(Post::class);
    }
    public function karyawans()
    {
        return $this->hasMany(Post::class);
    }
}
