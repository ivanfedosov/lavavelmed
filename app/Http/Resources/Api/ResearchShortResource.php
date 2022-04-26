<?php

/**
 * @file ResearchShortResource.php
 *
 * @date 10.11.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Research;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Research
 */
class ResearchShortResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
