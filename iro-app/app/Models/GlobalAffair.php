<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalAffair extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'external_link',
        'link_label',
        'file_path',
        'file_label'
    ];

    public function attachments()
    {
        return $this->hasMany(GlobalAffairAttachment::class);
    }

    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }
}
