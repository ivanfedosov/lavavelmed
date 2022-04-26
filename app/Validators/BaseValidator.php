<?php

/**
 * @file BaseValidator.php
 * MonitoringListResource
 * @date 06.05.2021
 *
 */

declare(strict_types=1);

namespace App\Validators;

abstract class BaseValidator
{
    public static function rules(): array
    {
        return [];
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function validate($data): array
    {
        return validator(
            $data,
            static::rules(),
        )->after(static function ($validator) use ($data) {
            //Custom validation here if need be
        })->validate();
    }
}
