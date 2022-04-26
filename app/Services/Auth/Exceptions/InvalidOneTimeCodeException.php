<?php

/**
 * @file InvalidOneTimeCodeException.php
 * MonitoringListResource
 * @date 29.04.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Auth\Exceptions;

class InvalidOneTimeCodeException extends \App\Exceptions\BaseException
{
    public function __construct()
    {
        parent::__construct(__('auth.authorization.invalid_one_time_code'));
    }

    public function getStatusCode(): int
    {
        return 403;
    }
}
