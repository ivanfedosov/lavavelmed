<?php

/**
 * @file MonitoringGh.php
 *
 * @date 11.05.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Monitoring extends Model
{
    public const WATER = 1;
    public const WEIGHT = 2;
    public const HEMOGLOBIN = 2;

    protected $fillable = [
        'patient_id',
        'value',
        'date',
        'type',
    ];

    protected $dates = [
        'date',
    ];

    protected $hidden = [
        'updated_at',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
