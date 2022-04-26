<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicationCreateRequest;
use App\Http\Requests\MedicationListUpdateRequest;
use App\Http\Requests\MedicationUpdateRequest;
use App\Http\Resources\Api\MedicationListResource;
use App\Models\Medication;
use App\Models\User;
use App\Repositories\MedicationRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MedicationController extends Controller
{
    public function __construct(
        protected MedicationRepository $medicationRepository
    ) {
    }

    public function index(Request $request): ResourceCollection
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        $day = $request->date;
        $year = $request->year;
        $month = $request->month;

        $medications = $this->medicationRepository->getForDate($day, $year, $month, $patient);

        return MedicationListResource::collection($medications);
    }

    public function show(Request $request, Medication $medication): MedicationListResource
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        $isMedicationExists = $patient->medication()->where('id', $medication->id)->exists();

        if ($isMedicationExists === false) {
            //TODO: exception из PQ
            throw new \Exception();
        }

        return new MedicationListResource($medication);
    }

    /**
     * @throws \Throwable
     */
    public function create(MedicationCreateRequest $request): void
    {
        $properties = $request->validated();

        $this->medicationRepository->create($properties);
    }

    /**
     * @throws \Throwable
     */
    public function update(MedicationUpdateRequest $request, Medication $medication): void
    {
        /** @var User $user */
        $user = $request->user();

        /** @var Medication $medicationRecord */
        $medicationRecord = $user->patient->medication()->where('id', $medication->id)->exists();

        if ($medicationRecord === false) {
            //TODO: exception из PQ
            throw new \Exception();
        }

        $data = $request->validated();

        $this->medicationRepository->update($data, $medication->id);
    }

    public function medicationListUpdate(MedicationListUpdateRequest $request): void
    {
        $data = $request->validated();
        $medications = $data['medications'];

        foreach ($medications as $medication) {
            $this->medicationRepository->update(['status' => $data['status']], $medication['id']);
        }
    }

    public function destroy(Request $request, Medication $medication): void
    {
        /** @var User $user */
        $user = $request->user();

        /** @var Medication $medicationRecord */
        $medicationRecord = $user->patient->medication()->where('id', $medication->id)->exists();

        if ($medicationRecord === false) {
            //TODO: exception из PQ
            throw new \Exception();
        }

        $this->medicationRepository->destroy($medication->id);
    }

    public function getMonthList(Request $request): array
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;
        $medications = $patient->medication->sortDesc();

        $dates = [];
        foreach ($medications as $medication) {
            $dates[] = $medication->date->format('m.Y');
        }

        $monthList = array_values(array_unique($dates));

        return ['data' => ['months' => $monthList]];
    }
}
