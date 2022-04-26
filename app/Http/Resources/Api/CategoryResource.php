<?php

/**
 * @file CategoryResource.php
 *
 * @date 27.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Category
 */
class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'research' => ResearchResource::collection($this->research),
        ];
    }
}
