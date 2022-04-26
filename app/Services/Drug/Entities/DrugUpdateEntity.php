<?php

/**
 * @file DrugUpdateEntity.php
 *
 * @date 11.11.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Drug\Entities;

class DrugUpdateEntity
{
    private ?string $title = null;
    private ?int $planned = null;
    private ?string $timers = null;
    private ?string $dosage = null;
    private ?int $frequency = null;
    private ?string $startDate = null;
    private ?string $endDate = null;

    public static function parse(array $data): DrugUpdateEntity
    {
        $drugUpdateEntity = new self();

        foreach ($data as $property => $datum) {
            if (\property_exists($drugUpdateEntity, $property)) {
                $drugUpdateEntity->{$property} = $datum;
            }
        }

        return $drugUpdateEntity;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getPlanned(): ?int
    {
        return $this->planned;
    }

    public function getTimers(): ?string
    {
        return $this->timers;
    }

    public function getDosage(): ?string
    {
        return $this->dosage;
    }

    public function getFrequency(): ?int
    {
        return $this->frequency;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(?string $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }
}
