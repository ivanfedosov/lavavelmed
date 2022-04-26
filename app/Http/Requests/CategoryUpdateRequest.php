<?php

/**
 * @file CategoryUpdateRequest.php
 *
 * @date 28.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'between:1,40'],
        ];
    }
}
