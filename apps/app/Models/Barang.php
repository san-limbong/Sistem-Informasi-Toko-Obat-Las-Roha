<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Barang extends Model
{
    use SoftDeletes;
    use HasFactory, Notifiable;
    protected $guarded =['id','name'];
    protected $with =['author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name','like','%'. $search.'%')
            ->orWhere('vendor','like','%' . $search .'%');
        });
    }
    public function category()
    {
    return$this->belongsTo(Category::class);
    }
    public function rencana()
    {
    return$this->belongsTo(Rencana::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }  
    static function detail_barang($id)
    {
        $data = Barang::where("id",$id)->first();
        // $data = Produk::find($id);
        return $data;
    }
}
