<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
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

    /**
     * The skills that belong to the project.
     */
    public function skills()
    {
        return $this->belongsToMany(\App\Models\Skill::class, 'project_skill')
                    ->withTimestamps();
    }

    /**
     * The user that owns the project.
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
