<?php

/**
 * @file ResearchUpdateEntity.php
 *
 * @date 09.11.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Research\Entities;

use App\Services\Image\Entities\ImageEntity;

class ResearchUpdateEntity
{
    /**
     * @var ImageEntity[]|array
     */
    private ?array $imagesCreate = null;
    /**
     * @var ImageEntity[]|array
     */
    private ?array $imagesUpdate = null;
    /**
     * @var ImageEntity[]|array
     */
    private ?array $imagesDelete = null;
    private ?string $title = null;

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getImagesCreate(): ?array
    {
        return $this->imagesCreate;
    }

    public function getImagesUpdate(): ?array
    {
        return $this->imagesUpdate;
    }

    public function getImagesDelete(): ?array
    {
        return $this->imagesDelete;
    }

    public function setImagesCreate(array $imageEntity): void
    {
        $this->imagesCreate = $imageEntity;
    }

    public function setImagesUpdate(array $imageEntity): void
    {
        $this->imagesUpdate = $imageEntity;
    }

    public function setImagesDelete(array $imageEntity): void
    {
        $this->imagesDelete = $imageEntity;
    }

    public function hasTitle(): bool
    {
        return $this->title !== null;
    }

    public function hasImagesCreate(): bool
    {
        return $this->imagesCreate !== null;
    }

    public function hasImagesUpdate(): bool
    {
        return $this->imagesUpdate !== null;
    }

    public function hasImagesDelete(): bool
    {
        return $this->imagesDelete !== null;
    }
}
