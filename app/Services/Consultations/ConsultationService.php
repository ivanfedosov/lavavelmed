<?php

/**
 * @file ConsultationService.php
 *
 * @date 07.10.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Consultations;

use App\Http\Resources\Api\ConsultationResource;
use App\Models\Doctor;
use Carbon\Carbon;

class ConsultationService
{
    public function doctorSchedule(Doctor $doctor, string $month, string $year): array
    {
        $currentMonth = Carbon::create($year, $month);
        $firstDay = $currentMonth->toDateString();
        $lastDay = $currentMonth->lastOfMonth()->toDateString();
        //TODO: мы тут получаем все консультации, по идее можем фильтровать на уровне relation
        $monthConsultations = $doctor->consultations->whereBetween('date', [$firstDay, $lastDay]);

        $days = [];
        foreach ($monthConsultations as $consultation) {
            $date = Carbon::parse($consultation['date'])->format('Y-m-d');

            $startTime = Carbon::parse($consultation['date'])->format('H:i');

            //TODO: плохо отправлять массивы в модели. В крайнем случае использовать ресурсы
            $days[$date][$startTime][] = new ConsultationResource($consultation);
        }

        return $days;
    }
}
