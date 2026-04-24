<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicProgram extends Model
{
    protected $guarded = [];

    // This automatically converts your JSON DB columns to arrays in Laravel!
    protected $casts = [
        'quick_facts' => 'array',
        'structure' => 'array',
        'eligibility' => 'array',
        'cta' => 'array',
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
