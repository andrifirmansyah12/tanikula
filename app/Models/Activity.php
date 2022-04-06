<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activity_category()
    {
        return $this->belongsTo(EducationCategory::class, 'category_education_id');
    }
    // protected $table = 'activities';
    // protected $fillable = [
    //     'name',
    //     'slug',
    //     'description',
    //     'image',
    // ];
}
