<?php

/**
 * @file MetricsRepository.php
 *
 * @date 16.11.2021
 *
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Monitoring;
use App\Models\Patient;
use AwesIO\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class MonitoringRepository extends BaseRepository
{
    public function getMonitoringForPatient(Patient $patient, $data): Collection
    {
        $type = $data['type'];

        if (array_key_exists('date', $data)) {
            $date = $data['date'];
            return $metrics = $patient->monitoring()->where('type', $type)->where('date', $date)->get();
        } else {
            return $metrics = $patient->monitoring()->where('type', $type)->get();
        }
    }

    public function getLastMonitoringForPatient(Patient $patient): Collection
    {
        return $patient->monitoring
            ->where('type', Monitoring::WEIGHT)
            ->orderBy('date', 'desc')
            ->take(2)
            ->get();
    }

    /**
     * @return mixed
     */
    public function entity()
    {
        return Monitoring::class;
    }
}
