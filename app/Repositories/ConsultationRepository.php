<?php

/**
 * @file ConsultationRepository.php
 *
 * @date 16.11.2021
 *
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Consultation;

class ConsultationRepository extends \AwesIO\Repository\Eloquent\BaseRepository
{
    public function entity()
    {
        return Consultation::class;
    }
}
