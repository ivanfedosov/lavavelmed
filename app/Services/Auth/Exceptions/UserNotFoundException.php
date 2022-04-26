<?php

/**
 * @file UserNotFoundException.php
 * MonitoringListResource
 * @date 29.04.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Auth\Exceptions;

class UserNotFoundException extends \App\Exceptions\BaseException
{
    public function __construct()
    {
        parent::__construct(__('auth.authorization.user_not_found'));
    }

    public function getStatusCode(): int
    {
        return 404;
    }
}
