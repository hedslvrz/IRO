<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IznPartnership extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'video_path',
    ];
}
