<?php

/**
 * @file Bmi.php
 * MonitoringListResource
 * @date 12.05.2021
 *
 */

declare(strict_types=1);

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmi extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'bmi_values';
    protected $guarded = ['id'];

    protected $fillable = [
        'min',
        'max',
        'is_diabetic',
        'title',
        'text',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
