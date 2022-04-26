<?php

/**
 * @file UserResource.php
 *
 * @date 02.11.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'avatar' => ImageResource::collection($this->media),
            'email' => $this->email,
            'phone' => $this->phone,
            'account_type' => $this->account_type,
            'full_name' => $this->full_name,
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'last_name' => $this->last_name,
            $this->mergeWhen(
                $this->account_type === User::DOCTOR,
                ['doctor' => new DoctorResource($this->doctor)]
            ),
            $this->mergeWhen(
                $this->account_type === User::PATIENT,
                ['patient' => new PatientResource($this->patient)]
            ),
        ];
    }
}
