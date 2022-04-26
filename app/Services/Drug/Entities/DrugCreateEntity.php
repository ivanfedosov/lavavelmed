<?php

/**
 * @file DrugCreateEntity.php
 *
 * @date 11.11.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Drug\Entities;

class DrugCreateEntity
{
    public function __construct(
        private string $title,
        private int $planned,
        private string $timers,
        private string $dosage,
        private int $frequency,
        private string $startDate,
        private string $endDate,
        private int $patientId,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPlanned(): int
    {
        return $this->planned;
    }

    public function getTimers(): string
    {
        return $this->timers;
    }

    public function getDosage(): string
    {
        return $this->dosage;
    }

    public function getFrequency(): int
    {
        return $this->frequency;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function getPatientId(): int
    {
        return $this->patientId;
    }
}
