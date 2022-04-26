<?php

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Drug;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Drug
 */
class MedicationDrugResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'patient' => $this->patient_id,
            'title' => $this->title,
            'dosage' => $this->dosage,
            'frequency' => $this->frequency,
            'timers' => $this->timers,
            'planned' => $this->planned,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
