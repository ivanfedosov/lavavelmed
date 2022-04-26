<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MonitoringListRequest;
use App\Http\Requests\MonitoringRequest;
use App\Http\Resources\Api\MonitoringListResource;
use App\Models\Monitoring;
use App\Models\User;
use App\Repositories\MonitoringRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MonitoringController extends Controller
{
    protected MonitoringRepository $monitoring;

    public function __construct(
        MonitoringRepository $monitoring,
    ) {
        $this->monitoring = $monitoring;
    }

    public function index(MonitoringListRequest $request): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        $data = $request->validated();

        $monitoring = $this->monitoring->getMonitoringForPatient($patient, $data);

        return MonitoringListResource::collection($monitoring);
    }

    public function store(MonitoringRequest $request): MonitoringListResource
    {
        /** @var User $user */
        $user = $request->user();

        $data = $request->validated();
        $data['patient_id'] = $user->patient->id;

        $monitoring = $this->monitoring->create($data);

        return new MonitoringListResource($monitoring);
    }

    public function destroy(Request $request, Monitoring $monitoring): void
    {
        /** @var User $user */
        $user = $request->user();

        $monitoring = $user->patient->monitoring()->where('id', $monitoring->id)->firstOrFail();

        $this->monitoring->destroy($monitoring->id);
    }

    public function getLastMonitoringValues(Request $request): MonitoringListResource
    {
        /** @var User $user */
        $user = $request->user();
        $patient = $user->patient;

        $monitoring = $this->monitoring->getLastMonitoringForPatient($patient);

        return new MonitoringListResource($monitoring);
    }
}
