<?php

/**
 * @file Code.php
 * MonitoringListResource
 * @date 28.03.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public const UPDATED_AT = null;

    protected $fillable = [
        'phone',
        'value',
        'created_at',
    ];
}
