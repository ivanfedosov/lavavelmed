<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BmiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'min' => ['required', 'numeric', 'max:999'],
            'max' => ['required', 'numeric', 'max:999'],
            'is_diabetic' => ['boolean'],
            'title' => ['required', 'string'],
            'text' => ['required', 'string'],
        ];
    }
}
