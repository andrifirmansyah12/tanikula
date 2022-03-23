<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function education()
    {
        return $this->hasMany(Education::class);
    }

}
