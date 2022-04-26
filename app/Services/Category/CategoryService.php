<?php

/**
 * @file CategoryService.php
 *
 * @date 26.10.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Category;

use App\Models\Category;
use App\Services\Category\Entities\CategoryCreateEntity;
use App\Services\Category\Entities\CategoryUpdateEntity;
use App\Services\Image\ImageService;
use Psr\Log\LoggerInterface;

class CategoryService
{
    public function __construct(
        private ImageService $imageService,
        private LoggerInterface $logger,
    ) {
    }

    public function create(CategoryCreateEntity $categoryEntity): void
    {
        $category = Category::create(
            [
                'title' => $categoryEntity->getTitle(),
                'patient_id' => $categoryEntity->getPatientId(),
            ]
        );

        $this->imageService->createImages($categoryEntity, $category);
    }

    public function update(CategoryUpdateEntity $categoryEntity, Category $category): void
    {
        if ($categoryEntity->hasTitle()) {
            $category->update([
                'title' => $categoryEntity->getTitle(),
            ]);
        }

        $this->imageService->createImages($categoryEntity, $category);

        $this->imageService->updateImagesComment($categoryEntity);

        $this->imageService->deleteImages($categoryEntity, $category);
    }
}
