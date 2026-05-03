<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalAffairAttachment extends Model
{
    protected $fillable = ['global_affair_id', 'type', 'label', 'path_or_url'];

    public function globalAffair()
    {
        return $this->belongsTo(GlobalAffair::class);
    }
}
