<?php

/**
 * @file RegisterRequest.php
 * MonitoringListResource
 * @date 26.03.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        $roles = array_keys(User::ROLES);

        return [
            'phone' => ['required', 'string', 'max:16', 'unique:users'],
            'account_type' => ['required', 'integer', Rule::in($roles)],
            'code' => ['required', 'string', 'max:4'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
