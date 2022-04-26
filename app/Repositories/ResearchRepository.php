<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Research;
use AwesIO\Repository\Eloquent\BaseRepository;

class ResearchRepository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function entity()
    {
        return Research::class;
    }
}
