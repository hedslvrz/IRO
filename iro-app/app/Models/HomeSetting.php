<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    protected $fillable = [
        'hero_title', 'hero_subtitle', 'hero_description', 'seals_image_path',
        'org_chart_title', 'org_chart_description', 'org_chart_image_path'
    ];
}
