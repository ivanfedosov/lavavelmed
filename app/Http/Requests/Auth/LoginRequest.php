<?php

/**
 * @file LoginRequest.php
 * MonitoringListResource
 * @date 14.04.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone' => ['required', 'string', 'max:16'],
            'code' => ['required', 'string', 'max:4'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
