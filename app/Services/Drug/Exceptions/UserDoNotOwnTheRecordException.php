<?php

/**
 * @file UserDoNotOwnTheRecordException.php
 * MonitoringListResource
 * @date 16.06.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Drug\Exceptions;

class UserDoNotOwnTheRecordException extends \App\Exceptions\BaseException
{
    public function __construct()
    {
        //TODO: многоязычность
        parent::__construct('Пользователь не имеет доступа к изменению этой записи');
    }

    public function getStatusCode(): int
    {
        return 405;
    }
}
