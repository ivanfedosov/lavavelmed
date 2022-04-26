<?php

/**
 * @file City.php
 *
 * @date 08.10.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hospitals(): HasMany
    {
        return $this->HasMany(Doctor::class);
    }
}
