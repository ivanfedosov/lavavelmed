<?php

/**
 * @file ImageResource.php
 *
 * @date 27.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @mixin Media
 */
class ImageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'uuid' =>  $this->uuid,
            'full' => $this->getFullUrl(),
            'thumb' => $this->getFullUrl('thumb'),
            'comment' => $this->getCustomProperty('comment'),
        ];
    }
}
