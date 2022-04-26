<?php

/**
 * @file DoctorValidator.php
 * MonitoringListResource
 * @date 06.05.2021
 *
 */

declare(strict_types=1);

namespace App\Validators\Profile;

use App\Validators\BaseValidator;

class DoctorValidator extends BaseValidator
{
    public static function rules(): array
    {
        return [
            'is_activated' => ['boolean'],
            'is_profile_filled' => ['boolean'],
            'qualification' => ['string', 'max:255'],
            'job' => ['string', 'max:255'],
            'experience' => ['integer', 'max:255'],
            'link_facebook' => ['string', 'max:255'],
            'link_twitter' => ['string', 'max:255'],
            'link_instagram' => ['string', 'max:255'],
            'link_prodoctorov' => ['string', 'max:255'],
            'city_id' => ['integer'],
            'specialisation_id' => ['integer'],
            'hospital_id' => ['integer'],
        ];
    }
}
