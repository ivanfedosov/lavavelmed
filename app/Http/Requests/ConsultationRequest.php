<?php

/**
 * @file ConsultationRequest.php
 *
 * @date 20.09.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255'],
            //TODO:
            'patient_id' => 'numeric',
            //TODO:
            'date' => ['required', 'string'],
        ];
    }
}
