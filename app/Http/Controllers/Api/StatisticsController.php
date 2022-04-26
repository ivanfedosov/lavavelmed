<?php

/**
 * @file StatisticsController.php
 *
 * @date 22.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ConsultationResource;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;

class StatisticsController extends Controller
{
    public function index(Request $request): ResourceCollection
    {
        /** @var User $user */
        $user = $request->user();

        return ConsultationResource::collection($user->doctor->consultations);
    }

    public function show(Request $request, Patient $patient): ResourceCollection
    {
        /** @var User $user */
        $user = $request->user();

        //TODO
        /** результат поиска одного пациента*/
        $patientResult = $user->doctor
            ->consultations()
            ->where('patient_id', $patient->id)
            ->get();

        return ConsultationResource::collection($patientResult);
    }

    public function getStatisticsByLastMonth(Request $request): ResourceCollection
    {
        /** @var User $user */
        $user = $request->user();

        $now = Carbon::now()->format('Y-m-d h:i:s');
        $monthAgo = Carbon::now()->subMonth()->format('Y-m-d h:i:s');

        $consultations = $user->doctor
            ->consultations()
            ->whereBetween('date', [$monthAgo, $now])
            ->get();

        return ConsultationResource::collection($consultations);
    }
}
