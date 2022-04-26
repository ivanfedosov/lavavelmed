<?php

/**
 * @file Drug.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Drug extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'title',
        'dosage',
        'frequency',
        'timers',
        'planned',
        'start_date',
        'end_date',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public const FREQUENCIES = [
        '1 раз в день' => '1 раз в день',
        '2 раза в день' => '2 раза в день',
        '3 раза в день' => '3 раза в день',
        '4 раза в день' => '4 раза в день',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function medications(): HasMany
    {
        return $this->hasMany(Medication::class);
    }

    public function specialisation(): HasOne
    {
        return $this->hasOne(Specialisation::class);
    }
}
