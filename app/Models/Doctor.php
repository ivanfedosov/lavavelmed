<?php

/**
 * @file Doctor.php
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

class Doctor extends Model
{
    use CrudTrait;

    protected $fillable = [
        'user_id',
        'is_activated',
        'qualification',
        'job',
        'experience',
        'link_facebook',
        'is_profile_filled',
        'link_twitter',
        'link_instagram',
        'link_prodoctorov',
        'specialisation_id',
        'hospital_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    public function hospital(): BelongsTo
    {
        return $this->BelongsTo(Hospital::class);
    }

    public function specialisation(): BelongsTo
    {
        return $this->BelongsTo(Specialisation::class);
    }
}
