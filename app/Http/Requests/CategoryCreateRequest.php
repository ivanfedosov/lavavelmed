<?php

/**
 * @file CategoryCreateRequest.php
 *
 * @date 28.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\Category\Entities\CategoryCreateEntity;
use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:1,40'],
        ];
    }

    public function entity(int $patientId): CategoryCreateEntity
    {
        $data = $this->validated();

        return new CategoryCreateEntity($data['title'], $patientId);
    }
}
