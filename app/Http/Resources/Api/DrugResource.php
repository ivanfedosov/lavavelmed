<?php

/**
 * @file DrugResource.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Drug;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Drug
 */
class DrugResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            //TODO: отображать ресурс вместо внешних ключей
            'patient' => $this->patient_id,
            'title' => $this->title,
            'dosage' => $this->dosage,
            'frequency' => $this->frequency,
            'timers' => $this->timers,
            'planned' => $this->planned,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'medications' => MedicationResource::collection($this->medications),
        ];
    }
}
