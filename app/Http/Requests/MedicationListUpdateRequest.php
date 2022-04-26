<?php

/**
 * @file MedicationListUpdateRequest.php
 *
 * @date 03.02.2022
 */

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Medication;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MedicationListUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'medications' => ['array'],
            'medications.*.id' => ['integer', Rule::exists('medications', 'id')],
            'medications.*.status' => ['integer', Rule::in(Medication::statuses())],
        ];
    }
}
