<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Karyawan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function role()
    {
    return$this->belongsTo(Role::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
    {
        return 'id';
    } 
    protected $fillable = [
        'namalengkap',
        'email',
        'password',
    ];
    public function group(){
        return $this->hasMany(Group::class);
    } 
    
   
}
