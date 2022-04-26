<?php

/**
 * @file ResearchCreateRequest.php
 *
 * @date 25.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\Image\Entities\ImageEntity;
use App\Services\Research\Entities\ResearchCreateEntity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResearchCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'between:1,40'],
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
            'images' => ['array'],
            'images.*.file' => ['file', 'mimes:jpeg,png,jpg', 'max:6096'],
            'images.*.comment' => ['string', 'nullable', 'between:1,100'],
        ];
    }

    public function entity(): ResearchCreateEntity
    {
        $data = $this->validated();

        $researchEntity = new ResearchCreateEntity($data['title'], (int) $data['category_id']);

        //TODO: === []
        if (empty($data['images'])) {
            return $researchEntity;
        }

        //TODO:
        $imageEntity = [];

        foreach ($data['images'] as $image) {
            if (array_key_exists('comment', $image)) {
                $imageEntity[] = new ImageEntity($image['file'], $image['comment']);
            } else {
                $imageEntity[] = new ImageEntity($imageEntity, null);
            }
        }

        $researchEntity->setImages($imageEntity);

        return $researchEntity;
    }
}
