<?php

/**
 * @file Patient.php
 *
 * @date 29.04.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use CrudTrait;

    public const DECLINED = 0;
    public const APPROVED = 1;
    public const WAITING = 2;

    public const ROLES = [
        self::DECLINED => 'DECLINED',
        self::APPROVED => 'APPROVED',
        self::WAITING => 'WAITING',
    ];

    protected $fillable = [
        'user_id',
        'doctor_id',
        'approve_status',
        'is_diabetic',
        'is_profile_filled',
        'max_weight',
        'gender',
        'weight',
        'birth_date',
        'operation_type',
        'height',
        'hospitalisation_date',
        'leaving_date',
        'operation_date',
        'operation_type',
    ];

    protected $dates = [
        'birth_date',
        'hospitalisation_date',
        'leaving_date',
        'operation_date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $with = ['user'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function monitoring(): HasMany
    {
        return $this->hasMany(Monitoring::class, 'patient_id');
    }

    public function doctor(): BelongsTo
    {
        return $this->BelongsTo(Doctor::class);
    }

    public function onesignalPlayers(): HasMany
    {
        return $this->hasMany(OnesignalPlayer::class, 'patient_id');
    }

    public function drugs(): HasMany
    {
        return $this->hasMany(Drug::class, 'patient_id');
    }

    public function operations(): HasMany
    {
        return $this->hasMany(Operation::class, 'patient_id');
    }

    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class, 'patient_id');
    }

    public function medication(): HasMany
    {
        return $this->hasMany(Medication::class, 'patient_id');
    }

    public function researchCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'patient_id');
    }

    public function waterNorm(): float|int
    {
        return (25 * (20 * ($this->height * $this->height))) / 10000;
    }

    public function weightDiff(): float|int
    {
        $lastWeight = $this->monitoring
            ->where('type', Monitoring::WEIGHT)
            ->first();

        $operationWeight = $this->weight;

        return $operationWeight - $lastWeight->value;
    }
}
