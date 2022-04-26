<?php

/**
 * @file MedicationUpdateRequest.php
 *
 * @date 14.12.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicationUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'patient_id' => ['integer'],
            'drug_id' => ['integer'],
            'notification_id' => ['string'],
            'date' => ['string'],
            'time' => ['string'],
            'status' => ['integer'],
        ];
    }
}
