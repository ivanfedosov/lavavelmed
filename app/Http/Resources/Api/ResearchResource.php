<?php

/**
 * @file ResearchResource.php
 *
 * @date 28.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Research;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Research
 */
class ResearchResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'images' => ImageResource::collection($this->media),
        ];
    }
}
