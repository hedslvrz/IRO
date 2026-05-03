<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
    'wmsu_profile',
    'video_path',
    'vision',
    'mission',
    'quality_policy_1',
    'quality_policy_2',
    'iro_mandate',    // Replaces office_function_intro
    'iro_functions',  // Replaces office_function_bullets
    'iro_programs',   // New
    'iro_services'    // New
    ];
}
