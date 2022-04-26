<?php

/**
 * @file NoAuthorizationCodesException.php
 * MonitoringListResource
 * @date 29.04.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Auth\Exceptions;

class NoAuthorizationCodesException extends \App\Exceptions\BaseException
{
    public function __construct()
    {
        parent::__construct(__('auth.authorization.no_authorization_codes'));
    }

    public function getStatusCode(): int
    {
        return 403;
    }
}
