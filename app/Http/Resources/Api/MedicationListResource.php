<?php


namespace App\Http\Resources\Api;

use App\Models\Medication;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Medication
 */
class MedicationListResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'drug' => new MedicationDrugResource($this->drug),
            'patient_id' => $this->patient_id,
            'notification_id' => $this->notification_id,
            'date' => $this->date,
            'time' => $this->time,
            'status' => $this->status,
        ];
    }
}
