<?php

/**
 * @file CityResource.php
 *
 * @date 11.11.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\City;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin City
 */
class CityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
