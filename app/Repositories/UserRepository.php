<?php

/**
 * @file UserRepository.php
 * MonitoringListResource
 * @date 29.03.2021
 *
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Code;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use AwesIO\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository
{
    protected static string $model = User::class;

    public function getById($userId): ?User
    {
        return $this->getModel()->where('id', $userId)->first();
    }

    public function getByPhone($userPhone): ?User
    {
        return $this->getModel()->where('phone', $userPhone)->first();
    }

    public function getDoctor($userId): ?Doctor
    {
        return $this->get()->where('id', $userId)->first();
    }

    public function getDoctorList(): Collection|array
    {
        return User::whereHas('doctor', static function ($query) {
            $query->where('is_activated', true);
        })->get();
    }

    public function getPatient($userId): ?Patient
    {
        return $this->getModel()->where('id', $userId)->first()->patient;
    }

    /**
     * Return count of deleted codes
     *
     * @throws \Exception
     */
    public function removeAllCodes($userPhone): int
    {
        return Code::where('phone', $userPhone)->delete();
    }

    /**
     * @return mixed
     */
    public function entity()
    {
        return User::class;
    }
}
