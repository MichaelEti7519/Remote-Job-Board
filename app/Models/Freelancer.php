<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Freelancer extends Model
{
    protected $fillable = [
        'name',
        'title',
        'bio',
        'detailed_bio',
        'skills',
        'hourly_rate',
        'rating',
        'jobs_completed',
        'success_rate',
        'earnings',
    ];

    protected $casts = [
        'skills' => 'array',
        'hourly_rate' => 'decimal:2',
        'rating' => 'decimal:1',
        'success_rate' => 'decimal:2',
        'earnings' => 'integer',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function hires(): HasMany
    {
        return $this->hasMany(Hire::class);
    }
}
