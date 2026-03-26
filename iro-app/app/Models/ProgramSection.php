<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramSection extends Model
{
    protected $guarded = [];

    public function program()
    {
        return $this->belongsTO(AcademicProgram::class, 'academic_program_id');
    }
}
