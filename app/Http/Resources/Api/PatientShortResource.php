<?php

/**
 * @file PatientShortResource.php
 *
 * @date 02.11.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Patient;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Patient
 */
class PatientShortResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
