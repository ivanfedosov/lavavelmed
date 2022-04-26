<?php

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Monitoring;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Monitoring
 */
class MonitoringListResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'value' => $this->value,
            'date' => $this->date,
            'water_norm' => $this->patient->waterNorm(),
            'weight_diff' => $this->patient->weightDiff(),
        ];
    }
}
