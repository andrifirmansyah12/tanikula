<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationPlant extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
