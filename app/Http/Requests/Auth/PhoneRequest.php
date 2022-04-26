<?php

/**
 * @file PhoneRequest.php
 * MonitoringListResource
 * @date 28.03.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

//TODO: rate limiter 1-2 обращения в минуту
class PhoneRequest extends FormRequest
{
    public function rules(): array
    {
        //TODO: сделать ограничение к API
        return [
            'phone' => ['required', 'string', 'max:16'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
