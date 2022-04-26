<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MonitoringListRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\MedicationResource;
use App\Http\Resources\Api\MonitoringListResource;
use App\Http\Resources\Api\ResearchResource;
use App\Http\Resources\Api\UserResource;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Research;
use App\Models\User;
use App\Repositories\MedicationRepository;
use App\Repositories\MonitoringRepository;
use App\Repositories\PatientRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DoctorController extends Controller
{
    public function __construct(
        protected PatientRepository $patientRepository,
        protected MedicationRepository $medicationRepository,
        protected MonitoringRepository $monitoringRepository,
    ) {
    }

    public function patients(Request $request): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = $request->user();
        $doctor = $user->doctor;

        $patients = $this->patientRepository->getPatientsList($doctor);

        return UserResource::collection($patients);
    }

    public function getPatientCard(Request $request, User $user): UserResource
    {
        $doctorUser = $request->user();
        $doctor = $doctorUser->doctor;
        $patient = $user->patient;

        $this->getDoctorsPatient($doctor, $user);

        $user->load([
            'patient', 'patient.researchCategories',
            'patient.researchCategories.research',
            'patient.drugs',
            'patient.medication',
            'patient.monitoring',
        ]);

        return new UserResource($user);
    }

    public function getPatientsResearchCategories(Request $request, User $user): AnonymousResourceCollection
    {
        $doctorUser = $request->user();
        $doctor = $doctorUser->doctor;

        $patient = $this->getDoctorsPatient($doctor, $user);

        return CategoryResource::collection($patient->researchCategories);
    }

    public function getPatientsResearchCategory(Request $request, User $user, Category $category): AnonymousResourceCollection
    {
        /** @var User $doctorUser */
        $doctorUser = $request->user();
        $doctor = $doctorUser->doctor;

        $patient = $this->getDoctorsPatient($doctor, $user);

        return ResearchResource::collection($category->research);
    }

    public function getPatientsDetailResearch(Request $request, User $user, Category $category, Research $research): ResearchResource
    {
        $doctorUser = $request->user();
        $doctor = $doctorUser->doctor;

        $patient = $this->getDoctorsPatient($doctor, $user);

        $checkCategory = Category::where('patient_id', $patient->id)
            ->where('id', $category->id)
            ->exists();

        if ($checkCategory === false) {
            //TODO: exception из PQ
            throw new \Exception();
        }

        return new ResearchResource($research);
    }

    public function getPatientMedications(Request $request, User $user): AnonymousResourceCollection
    {
        /** @var User $doctorUser */
        $doctorUser = $request->user();
        $doctor = $doctorUser->doctor;

        $patient = $this->getDoctorsPatient($doctor, $user);

        $day = $request->date;
        $year = $request->year;
        $month = $request->month;

        $medications = $this->medicationRepository->getForDate($day, $year, $month, $patient);
        $medications->load('drug');

        return MedicationResource::collection($medications);
    }

    public function getPatientsMonitoring(MonitoringListRequest $request, User $user): AnonymousResourceCollection
    {
        /** @var User $doctorUser */
        $doctorUser = $request->user();
        $doctor = $doctorUser->doctor;
        $data = $request->validated();

        $patient = $this->getDoctorsPatient($doctor, $user);

        $monitoring = $this->monitoringRepository->getMonitoringForPatient($patient, $data);

        return MonitoringListResource::collection($monitoring);
    }

    public function getDoctorsPatient(Doctor $doctor, User $patientUser): Patient
    {
        $patient = $patientUser;

        //TODO
        $checkDoctorsPatient = $doctor->patients()->where('id', $patientUser->id)->exists();

        return $patientUser->patient;
    }
}
