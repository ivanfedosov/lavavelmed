<?php

/**
 * @file UserValidator.php
 * MonitoringListResource
 * @date 07.05.2021
 *
 */

declare(strict_types=1);

namespace App\Validators\Profile;

use App\Validators\BaseValidator;

class UserValidator extends BaseValidator
{
    public static function rules(): array
    {
        return [
            'full_name' => ['string', 'max:255'],
            'first_name' => ['string', 'max:255'],
            'second_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'phone' => ['string', 'max:16'],
            'email' => ['string', 'max:255'],
            'is_banned' => ['boolean'],
            'lang' => ['string', 'max:2'],
            'timezone' => ['string', 'max:10'],
        ];
    }
}
