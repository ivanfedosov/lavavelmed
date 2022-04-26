<?php

/**
 * @file OnesignalPlayer.php
 * MonitoringListResource
 * @date 02.06.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OnesignalPlayer extends Model
{
    protected $fillable = [
        'patient_id',
        'onesignal_token',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
