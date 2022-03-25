<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
=======
    protected $table = 'activities';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];
>>>>>>> 3f2c491c6b59c9f00bf53a2bee6fb116ae7ee9ae
}
