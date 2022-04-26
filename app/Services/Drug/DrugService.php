<?php

/**
 * @file DrugService.php
 * MonitoringListResource
 * @date 02.06.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Drug;

use App\Models\Drug;
use App\Models\Medication;
use App\Services\Drug\Entities\DrugCreateEntity;
use Carbon\CarbonPeriod;
use JsonException;

class DrugService
{
    public static function handle(Drug $drug): Drug
    {
        return (new static())->createMedicationsForDrug($drug);
    }

    /**
     * @throws \Throwable
     */
    public function create(DrugCreateEntity $drugEntity): void
    {
        $drugFields = [
            'title' => $drugEntity->getTitle(),
            'planned' => $drugEntity->getPlanned(),
            'timers' => $drugEntity->getTimers(),
            'dosage' => $drugEntity->getDosage(),
            'frequency' => $drugEntity->getFrequency(),
            'start_date' => $drugEntity->getStartDate(),
            'end_date' => $drugEntity->getEndDate(),
            'patient_id' => $drugEntity->getPatientId(),
        ];

        $drug = Drug::create($drugFields);

        $this->createMedicationsForDrug($drug);
    }

    public function update(array $data, Drug $drug): void
    {
        $drug->update($data);
        if (array_key_exists('title', $data) || array_key_exists('timers', $data) || array_key_exists('end_date', $data) || array_key_exists('start_date', $data) || array_key_exists('frequency', $data)) {
            $this->createMedicationsForDrug($drug);
        }
    }

    /**
     * @throws JsonException
     */
    private function convertTimersFromStringToJson(?string $timers): ?string
    {
        if ($timers === null) {
            return null;
        }

        $preparingTimers = explode(',', $timers);

        $preparingTimers = array_map(
            static function ($time): string {
                return trim($time);
            },
            $preparingTimers
        );

        return json_encode($preparingTimers, JSON_THROW_ON_ERROR);
    }

    public function createMedicationsForDrug(Drug $drug): Drug
    {
        $drug->medications()->delete();

        $ranges = CarbonPeriod::create($drug->getAttribute('start_date'), $drug->getAttribute('end_date'));
        $timers = explode(', ', $drug->timers);

        foreach ($ranges as $date) {
            foreach ($timers as $timer) {
                $medication = Medication::create(
                    [
                        'patient_id' => $drug->getAttribute('patient_id'),
                        'drug_id' => $drug->id,
                        'notification_id' => "",
                        'date' => $date->format('Y-m-d'),
                        'time' => $timer,
                        'status' => Medication::AWAIT,
                    ],
                );
            }
        }

        return $drug;
    }
}
