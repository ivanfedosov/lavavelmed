<?php

/**
 * @file CalendarRequest.php
 *
 * @date 20.09.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'month' => ['numeric', 'max:12'],
            'year' => ['numeric'],
        ];
    }
}
