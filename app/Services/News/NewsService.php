<?php

/**
 * @file NewsService.php
 *
 * @date 09.06.2021
 *
 */

declare(strict_types=1);

namespace App\Services\News;

use App\Models\News;
use App\Models\Operation;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;

class NewsService
{
    public function getNewsType(Patient $patient, Operation $lastOperation): int
    {
        $date = today();

        return match (true) {
            $date === $patient->getAttribute('leaving_date') => News::IN_LEAVING,
            $date === $patient->getAttribute('hospitalisation_date') => News::IN_HOSPITALISATION,
            $date === $patient->getAttribute('operation_date') => News::IN_OPERATION,
            $date >= $patient->getAttribute('operation_date') => News::AFTER_OPERATION,
            $date <= $patient->getAttribute('operation_date') => News::BEFORE_OPERATION,
            default => News::MONITORING,
        };
    }

    public function getTargetNews(Patient $patient): Collection
    {
        $date = now();
        //TODO:

        $lastOperation = $patient->getAttribute('operation_date');
        //$date->diffInDays($patient->operation_date);

        return News::get();
    }

    public function getAllNews(Patient $patient): Collection
    {
        $targetNews = $this->getTargetNews($patient);
        $commonNews = News::where('type', News::MONITORING)->get();

        return News::get();
    }
}
