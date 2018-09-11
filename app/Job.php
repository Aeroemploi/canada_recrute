<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'order_id', 'job_title_fr', 'job_title_en', 'link', 'location', 'job_type', 'is_active'
    ];

    public const JOBS_TYPES = [
        'full_time' => 'text.jobs.full_time',
        'part_time' => 'text.jobs.part_time',
        'contract' => 'text.jobs.contractor',
    ];
}
