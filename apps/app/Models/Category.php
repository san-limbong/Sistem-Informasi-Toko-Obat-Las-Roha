<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Category extends Model
{

    use HasFactory, Notifiable;

   
    protected $guarded = ['id'];
    protected $fillable = [
        'name',   
    ];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name','like','%'. $search.'%');
        });
    }

    public function barangs()
    {
        return $this->hasMany(Post::class);
    }
    
}




