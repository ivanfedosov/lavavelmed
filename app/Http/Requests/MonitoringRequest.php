<?php

/**
 * @file MonitoringRequest.php
 *
 * @date 12.05.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonitoringRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['integer', 'required', 'max:3'],
            'date' => ['string', 'required'],
            'value' => ['numeric','required'],
        ];
    }
}
