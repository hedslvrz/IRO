<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sdg extends Model
{
    use HasFactory;

    protected $fillable = ['sdg_number', 'title', 'overview', 'image_path'];

    public function topics()
    {
        return $this->hasMany(SdgTopic::class);
    }
}
