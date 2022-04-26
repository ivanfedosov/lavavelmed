<?php

/**
 * @file MedicationResource.php
 *
 * @date 13.12.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Medication;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Medication
 */
class MedicationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'drug' => new DrugResource($this->whenLoaded('drug')),
            'notification_id' => $this->notification_id,
            'date' => $this->date,
            'time' => $this->time,
            'status' => $this->status,
        ];
    }
}
