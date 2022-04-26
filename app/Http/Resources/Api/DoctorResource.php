<?php

/**
 * @file DoctorResource.php
 *
 * @date 08.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Doctor;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Doctor
 */
class DoctorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'qualification' => $this->qualification,
            'job' => $this->job,
            'experience' => $this->experience,
            'link_facebook' => $this->link_facebook,
            'is_activated' => $this->is_activated,
            'is_profile_filled' => $this->is_profile_filled,
            'link_twitter' => $this->link_twitter,
            'link_instagram' => $this->link_instagram,
            'link_prodoctorov' => $this->link_prodoctorov,
            'specialisation' => $this->specialisation,
            'hospital' => new HospitalResource($this->hospital),
        ];
    }
}
