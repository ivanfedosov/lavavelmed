<?php

/**
 * @file BmiObserver.php
 * MonitoringListResource
 * @date 13.05.2021
 *
 */

declare(strict_types=1);

namespace App\Observers;

use App\Models\Patient;
use App\Services\Bmi\BmiService;

class BmiObserver
{
    public function retrieved(Patient $patient): Patient
    {
        return BmiService::handle($patient);
    }
}
