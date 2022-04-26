<?php

/**
 * @file PatientResource.php
 *
 * @date 08.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Patient
 */
class PatientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'approve_status' => $this->approve_status,
            $this->mergeWhen(
                $this->getDoctor() !== null,
                ['related_doctor' => new UserResource($this->getDoctor())]
            ),
            'is_diabetic' => $this->is_diabetic,
            'max_weight' => $this->max_weight,
            'gender' => $this->gender,
            'weight' => $this->weight,
            'is_profile_filled' => $this->is_profile_filled,
            'birth_date' => $this->birth_date,
            'height' => $this->height,
            'hospitalisation_date' => $this->hospitalisation_date,
            'operation_date' => $this->operation_date,
            'operation_type' => $this->operation_type,
            'leaving_date' => $this->leaving_date,
            'monitoring' => MonitoringListResource::collection($this->whenLoaded('monitoring')),
            'research_categories' => CategoryResource::collection($this->whenLoaded('researchCategories')),
            'drugs' => DrugResource::collection($this->whenLoaded('drugs')),
            'bmi' => $this->bmi,
        ];
    }

    public function getDoctor(): ?User
    {
        $doctor = Doctor::find($this->doctor_id);
        if ($doctor) {
            return $doctor->user;
        } else {
            return null;
        }
    }
}
