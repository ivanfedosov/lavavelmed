<?php

/**
 * @file CategoryRepository.php
 *
 * @date 16.11.2021
 *
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use AwesIO\Repository\Eloquent\BaseRepository as BaseRepositoryAlias;

class CategoryRepository extends BaseRepositoryAlias
{
    public function entity()
    {
        return Category::class;
    }
}
