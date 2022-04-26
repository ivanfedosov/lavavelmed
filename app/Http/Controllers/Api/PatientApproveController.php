<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApprovePatientRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\Patient;
use App\Models\User;
use App\Repositories\PatientRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PatientApproveController extends Controller
{
    public function __construct(
        protected PatientRepository $patientRepository,
        protected UserRepository $userRepository,
    ) {
    }

    public function doctorsList(): AnonymousResourceCollection
    {
        return UserResource::collection($this->userRepository->getDoctorList());
    }

    public function sendRequestForApprove(Request $request, int $doctorId): void
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        $doctorUser = User::findOrFail($doctorId);
        $doctor = $doctorUser->doctor;

        $this->patientRepository->update(['approve_status' => Patient::WAITING, 'doctor_id' => $doctor->id], $patient->id);
    }

    public function approvePatient(ApprovePatientRequest $request, int $patientId): void
    {
        $data = $request->validated();

        $patientUser = $this->userRepository->getById($patientId);
        $patient = $patientUser->patient;

        $this->patientRepository->updateApproveStatus((int) $data['approve'], $patient->id);
    }

    public function waitingForDoctorsApproveList(Request $request): Collection
    {
        /** @var User $user */
        $user = $request->user();
        $doctor = $user->doctor;

        return $this->patientRepository->getWaitingListForApprove($doctor);
    }
}
