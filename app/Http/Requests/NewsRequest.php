<?php

/**
 * @file NewsRequest.php
 *
 * @date 08.06.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            //TODO:
//            [
//                'en' => [
//                    'title',
//                    'text',
//                    'active',
//                ],
//                'ru' => [
//                    'title',
//                    'text',
//                    'active',
//                ],
//            ],
            'title_en' => ['required', 'string'],
            'title_ru' => ['required', 'string'],
            'text_en' => ['required', 'string'],
            'text_ru' => ['required', 'string'],
            'active' => ['boolean'],
        ];
    }
}
