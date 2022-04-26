<?php

/**
 * @file MedicationRepository.php
 *
 * @date 13.12.2021
 *
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Medication;
use App\Models\Patient;
use AwesIO\Repository\Eloquent\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class MedicationRepository extends BaseRepository
{
    public function getForDate($day, $year, $month, Patient $patient): Collection
    {
        $medications = $patient->medication;

        if (isset($day)) {
            $medications = $patient->medication()->whereDate('date', $day)->get();
        }

        if (isset($year) && isset($month)) {
            $currentMonth = Carbon::create($year, $month);
            $firstDay = $currentMonth->toDateString();
            $lastDay = $currentMonth->lastOfMonth()->toDateString();

            $medications = $patient->medication()
                ->where('date', '>=', $firstDay)
                ->where('date', '<=', $lastDay)
                ->get();
        }

        return $medications;
    }

    /**
     * @return mixed
     */
    public function entity(): mixed
    {
        return Medication::class;
    }
}
