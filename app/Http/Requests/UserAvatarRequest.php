<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAvatarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'avatar' => ['file', 'mimes:jpeg,png,jpg', 'max:6096'],
        ];
    }
}
