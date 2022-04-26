<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Doctor;
use App\Models\Patient;
use AwesIO\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class PatientRepository extends BaseRepository
{
    public function getWaitingListForApprove(Doctor $doctor): Collection
    {
        return $doctor->patients()
            ->where('approve_status', Patient::WAITING)
            ->get();
    }

    public function getPatientsList(Doctor $doctor): array
    {
        $users = [];
        $patients = $doctor->patients()->with('user')->get();

        foreach ($patients as $patient) {
            $users[] = $patient['user'];
        }

        return $users;
    }

    public function updateApproveStatus(int $status, int $patient): void
    {
        $data = [];
        $data['approve_status'] = $status;

        if ($status === Patient::DECLINED) {
            $data['doctor_id'] = null;
        }

        $this->update($data, $patient);
    }

    public function entity()
    {
        return Patient::class;
    }
}
