<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicProgram extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'college_id','title', 'slug', 'category', 'degree_level', 'overview', 'eligibility',
        'image', 'quick_facts', 'structure', 'opportunities'
    ];

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
