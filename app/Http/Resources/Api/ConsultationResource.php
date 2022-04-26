<?php

/**
 * @file ConsultationResource.php
 *
 * @date 02.11.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Consultation;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * @mixin Consultation
 */
class ConsultationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date' => $this->date,
            'doctor' => new UserResource($this->whenLoaded('doctor')),
            'patient' => new PatientShortResource($this->whenLoaded('patient')),
        ];
    }
}
