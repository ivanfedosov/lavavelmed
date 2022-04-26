<?php

/**
 * @file ImageService.php
 *
 * @date 10.11.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Image;

use App\Services\Image\Entities\ImageEntity;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageService
{
    public function createImages(object $entity, Model $model): void
    {
        if ($entity->hasImagesCreate()) {
            foreach ($entity->getImagesCreate() as $image) {
                if ($image->getComment()) {
                    $model->addMedia($image->getFile())
                        ->withCustomProperties(['comment' => $image->getComment()])
                        ->toMediaCollection('images');
                } else {
                    $model->addMedia($image->getFile())
                        ->toMediaCollection('images');
                }
            }
        }
    }

    public function updateImagesComment(object $entity): void
    {
        if ($entity->hasImagesUpdate()) {
            foreach ($entity->getImagesUpdate() as $image) {
                $this->setUpdatedImageComment($image);
            }
        }
    }

    public function deleteImages(object $entity, $model): void
    {
        if ($entity->hasImagesDelete()) {
            foreach ($entity->getImagesDelete() as $image) {
                foreach ($model->getMedia('images') as $item) {
                    if ($item['uuid'] === $image->getFile()) {
                        $item->delete();
                    }
                }
            }
        }
    }

    private function setUpdatedImageComment(ImageEntity $image): void
    {
        //TODO: почему mediaItem[0]?
        $mediaItem = Media::where('uuid', $image->getFile())->get();
        $mediaItem[0]->setCustomProperty('comment', $image->getComment());
        $mediaItem[0]->save();
    }
}
