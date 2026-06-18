<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hire extends Model
{
    protected $fillable = [
        'freelancer_id',
        'job_title',
        'description',
        'duration',
        'amount',
        'status',
    ];

    protected $casts = [
        'amount' => 'integer',
    ];

    public function freelancer(): BelongsTo
    {
        return $this->belongsTo(Freelancer::class);
    }
}
