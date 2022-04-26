<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Drug;
use AwesIO\Repository\Eloquent\BaseRepository;

class DrugRepository extends BaseRepository
{
    public function entity()
    {
        return Drug::class;
    }
}
