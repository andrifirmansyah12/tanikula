<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

     protected $guarded = ['id'];

    public function costumer()
    {
        return $this->hasMany(Costumer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    //Local Scope
    // public function scopeFilter($query, array $filters)
    // {
    //     // Isset Function
    //     $query->when($filters['pencarian'] ?? false, function($query, $search) {
    //         return $query->where('recipients_name', 'like', '%' . $search . '%');
    //     });
    // }
}
