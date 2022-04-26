<?php

/**
 * @file Orders.php
 *
 * @date 20.09.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consultation extends Model
{
    protected $fillable = [
        'doctor_id',
        'title',
        'patient_id',
        'date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $with = ['patient'];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
