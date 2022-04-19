<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poktan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gapoktan()
    {
        return $this->belongsTo(Gapoktan::class);
    }

    public function farmer()
    {
        return $this->hasMany(Farmer::class);
    }
}
