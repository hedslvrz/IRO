<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccreditedProgram extends Model
{
    protected $guarded = [];

    public function programs()
    {
        return $this->hasMany(AcademicProgram::class)->orderBy('title');  
    }
}
