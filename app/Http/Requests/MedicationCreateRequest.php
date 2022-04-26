<?php

/**
 * @file MedicationCreateRequest.php
 *
 * @date 13.12.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicationCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'patient_id' => ['required', 'integer'],
            'drug_id' => ['required', 'integer'],
            'notification_id' => ['required', 'string'],
            'date' => ['required', 'string'],
            'time' => ['required', 'string'],
            'status' => ['required', 'integer'],
        ];
    }
}
