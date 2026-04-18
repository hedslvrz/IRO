<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdgTopic extends Model
{
    use HasFactory;

    protected $fillable = ['sdg_id', 'title', 'description'];

    public function sdg()
    {
        return $this->belongsTo(Sdg::class);
    }
}
