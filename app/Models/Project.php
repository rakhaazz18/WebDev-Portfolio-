<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'demo_url',
        'github_url',
        'technologies',
        'completed_date',
        'is_featured'
    ];

    protected $casts = [
        'technologies' => 'array',
        'completed_date' => 'date',
        'is_featured' => 'boolean',
    ];
}
