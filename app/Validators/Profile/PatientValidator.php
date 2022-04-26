<?php

/**
 * @file PatientValidator.php
 * MonitoringListResource
 * @date 06.05.2021
 *
 */

declare(strict_types=1);

namespace App\Validators\Profile;

use App\Validators\BaseValidator;

class PatientValidator extends BaseValidator
{
    public static function rules(): array
    {
        return [
            'doctor_id' => ['integer'],
            'is_approved' => ['boolean'],
            'is_diabetic' => ['boolean'],
            'is_profile_filled' => ['boolean'],
            'operation_type' => ['integer'],
            'weight' => ['integer'],
            'operation_date' => ['date'],
            'max_weight' => ['integer'],
            'gender' => ['integer'],
            'birth_date' => ['date'],
            'height' => ['integer'],
            'hospitalisation_date' => ['date'],
            'leaving_date' => ['date'],
        ];
    }
}
