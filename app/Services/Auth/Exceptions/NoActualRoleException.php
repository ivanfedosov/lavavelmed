<?php

/**
 * @file NoActualRoleException.php
 *
 * @date 07.10.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Auth\Exceptions;

class NoActualRoleException extends \App\Exceptions\BaseException
{
    public function __construct()
    {
        parent::__construct(__('auth.authorization.role_not_found'));
    }

    public function getStatusCode(): int
    {
        return 403;
    }
}
