<?php

/**
 * @file InvalidDateRangeException.php
 * MonitoringListResource
 * @date 16.06.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Drug\Exceptions;

class InvalidDateRangeException extends \App\Exceptions\BaseException
{
    public function __construct()
    {
        //TODO: многоязычность
        parent::__construct('Невалидный диапазон дат');
    }

    public function getStatusCode(): int
    {
        return 405;
    }
}
