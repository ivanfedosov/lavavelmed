<?php

/**
 * @file ImageEntity.php
 *
 * @date 09.11.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Image\Entities;

class ImageEntity
{
    public function __construct(
        private mixed $file,
        private ?string $comment = null,
    ) {
    }

    /**
     * @return mixed
     */
    public function getFile(): mixed
    {
        return $this->file;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }
}
