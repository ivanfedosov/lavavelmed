<?php

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Specialisation;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Specialisation
 */
class SpecialisationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
