<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function getRelatedDoctor(Request $request): ?UserResource
    {
        /** @var User $user */
        $user = $request->user();
        $doctor = $user->patient->doctor;
        if ($doctor !== null) {
            return new UserResource($user->patient->doctor->user);
        } else {
            return null;
        }
    }
}
