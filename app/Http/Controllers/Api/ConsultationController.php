<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalendarRequest;
use App\Http\Requests\ConsultationRequest;
use App\Http\Resources\Api\ConsultationResource;
use App\Models\User;
use App\Repositories\ConsultationRepository;
use App\Services\Consultations\ConsultationService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ConsultationController extends Controller
{
    protected ConsultationRepository $consultation;

    public function __construct(
        protected ConsultationService $consultationService,
        ConsultationRepository $consultation
    ) {
        $this->consultation = $consultation;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        return ConsultationResource::collection($patient->consultations);
    }

    public function store(ConsultationRequest $request): ConsultationResource
    {
        /** @var User $user */
        $user = $request->user();
        $data = $request->validated();

        $data['doctor_id'] = $user->doctor->id;

        $consultation = $this->consultation->create($data);

        return new ConsultationResource($consultation);
    }

    public function calendar(CalendarRequest $request): array
    {
        /** @var User $user */
        $user = $request->user();
        $doctor = $user->doctor;

        $data = $request->validated();
        //TODO:

        //TODO:
        return $this->consultationService->doctorSchedule($doctor, $data['month'], $data['year']);
    }
}
