<?php

/**
 * @file Hospital.php
 *
 * @date 08.10.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hospital extends Model
{
    protected $fillable = [
        'name',
        'description',
        'city_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function doctor(): HasOne
    {
        return $this->HasOne(Doctor::class);
    }

    public function city(): BelongsTo
    {
        return $this->BelongsTo(City::class);
    }
}
