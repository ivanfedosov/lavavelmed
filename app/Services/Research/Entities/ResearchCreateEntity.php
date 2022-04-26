<?php

/**
 * @file ResearchCreateEntity.php
 *
 * @date 09.11.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Research\Entities;

use App\Services\Image\Entities\ImageEntity;

class ResearchCreateEntity
{
    /**
     * @var ImageEntity[]|array
     */
    private ?array $images = null;

    public function __construct(
        private string $title,
        private int $categoryId,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
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
