<?php


declare(strict_types=1);

namespace App\Repositories;

use App\Models\Doctor;
use AwesIO\Repository\Eloquent\BaseRepository;

class DoctorRepository extends BaseRepository
{
    public function entity()
    {
        return Doctor::class;
    }
}
