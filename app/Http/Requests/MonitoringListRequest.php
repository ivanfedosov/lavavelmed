<?php

/**
 * @file MonitoringListRequest.php
 *
 * @date 16.11.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonitoringListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['integer', 'required', 'max:3'],
            'date' => ['string'],
        ];
    }
}
