<?php

/**
 * @file Medication.php
 * MonitoringListResource
 * @date 24.05.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medication extends Model
{
    public const AWAIT = 1;
    public const USED = 2;
    public const SKIPPED = 3;

    protected $fillable = [
        'patient_id',
        'drug_id',
        'notification_id',
        'date',
        'time',
        'status',
    ];

    protected $dates = ['date'];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class);
    }

    public function weightDiff()
    {
    }

    public static function statuses(): array
    {
        return [
            self::AWAIT => 1,
            self::USED => 2,
            self::SKIPPED => 3,
        ];
    }
}
