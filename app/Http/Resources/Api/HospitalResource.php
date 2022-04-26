<?php

/**
 * @file HospitalResource.php
 *
 * @date 11.11.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Hospital;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Hospital
 */
class HospitalResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'city' => new CityResource($this->city),
        ];
    }
}
