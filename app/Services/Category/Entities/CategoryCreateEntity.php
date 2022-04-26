<?php

/**
 * @file CategoryCreateEntity.php
 *
 * @date 09.11.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Category\Entities;

use App\Services\Image\Entities\ImageEntity;

class CategoryCreateEntity
{
    /**
     * @var ImageEntity[]|array
     */
    private ?array $images = null;

    public function __construct(
        private string $title,
        private int $patientId,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPatientId(): int
    {
        return $this->patientId;
    }

    public function getImagesCreate(): ?array
    {
        return $this->images;
    }

    public function hasImagesCreate(): bool
    {
        return $this->images !== null;
    }

    public function setImages(array $imageEntity): void
    {
        $this->images = $imageEntity;
    }
}
