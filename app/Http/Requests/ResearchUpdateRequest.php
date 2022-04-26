<?php

/**
 * @file ResearchUpdateRequest.php
 *
 * @date 26.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\Image\Entities\ImageEntity;
use App\Services\Research\Entities\ResearchUpdateEntity;
use Illuminate\Foundation\Http\FormRequest;

class ResearchUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'between:1,40'],
            'images_create.*.file' => ['file', 'mimes:jpeg,png,jpg', 'max:6096'],
            'images_create.*.comment' => ['string', 'nullable'],
            'images_update.*.uuid' => ['string'],
            'images_update.*.comment' => ['string', 'nullable'],
            'images_delete.*' => ['string'],
        ];
    }

    public function entity(): ResearchUpdateEntity
    {
        $data = $this->validated();

        $researchEntity = new ResearchUpdateEntity();
        $imageEntity = [];

        if (!empty($data['title'])) {
            $researchEntity->setTitle($data['title']);
        }

        if (!empty($data['images_create'])) {
            foreach ($data['images_create'] as $image) {
                if (array_key_exists('comment', $image)) {
                    $imageEntity[] = new ImageEntity($image['file'], $image['comment']);
                } else {
                    $imageEntity[] = new ImageEntity($image['file'], null);
                }
            }

            $researchEntity->setImagesCreate($imageEntity);
        }

        if (!empty($data['images_update'])) {
            foreach ($data['images_update'] as $image) {
                if (array_key_exists('comment', $image)) {
                    $imageEntity[] = new ImageEntity($image['file'], $image['comment']);
                } else {
                    $imageEntity[] = new ImageEntity($image['file'], null);
                }
            }

            $researchEntity->setImagesUpdate($imageEntity);
        }

        if (!empty($data['images_delete'])) {
            foreach ($data['images_delete'] as $image) {
                $imageEntity[] = new ImageEntity($image);
            }

            $researchEntity->setImagesDelete($imageEntity);
        }

        return $researchEntity;
    }
}
