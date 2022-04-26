<?php

/**
 * @file Research.php
 *
 * @date 28.10.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Research;

use App\Models\Category;
use App\Models\Research;
use App\Services\Image\ImageService;
use App\Services\Research\Entities\ResearchCreateEntity;
use App\Services\Research\Entities\ResearchUpdateEntity;

class ResearchService
{
    public function __construct(
        private ImageService $imageService,
    ) {
    }

    public function create(ResearchCreateEntity $researchEntity): void
    {
        $research = Research::create(
            [
                'title' => $researchEntity->getTitle(),
                'category_id' => $researchEntity->getCategoryId(),
            ]
        );

        $this->imageService->createImages($researchEntity, $research);
    }

    public function update(ResearchUpdateEntity $researchEntity, Research $research): void
    {
        if ($researchEntity->hasTitle()) {
            $research->update([
                'title' => $researchEntity->getTitle(),
            ]);
        }

        $this->imageService->createImages($researchEntity, $research);

        $this->imageService->updateImagesComment($researchEntity);

        $this->imageService->deleteImages($researchEntity, $research);
    }

    public function deleteCategoryModel(int $id): void
    {
        $categories = Category::whereResearchId($id)->get();

        foreach ($categories as $category) {
            $category->delete();
        }
    }
}
