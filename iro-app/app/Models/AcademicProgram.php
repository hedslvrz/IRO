<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicProgram extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(AccreditedProgram::class, 'accredited_programs_id');
    }
    public function sections()
    {
        return $this->hasMany(ProgramSection::class)->orderBy('order-index');
    }
}
