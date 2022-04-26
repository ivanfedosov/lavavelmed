<?php

/**
 * @file ProfileController.php
 *
 * @date 28.04.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserAvatarRequest;
use App\Http\Resources\Api\CityResource;
use App\Http\Resources\Api\HospitalResource;
use App\Http\Resources\Api\ImageResource;
use App\Http\Resources\Api\SpecialisationResource;
use App\Http\Resources\Api\UserResource;
use App\Models\City;
use App\Models\Hospital;
use App\Models\Specialisation;
use App\Models\User;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProfileController
{
    public function __construct(
        protected ProfileService $profileService,
    ) {
    }

    public function index(Request $request): UserResource
    {
        /** @var User $user */
        $user = $request->user();
        $user->load(
            [
                'doctor',
                'patient',
            ]
        );

        return new UserResource($user);
    }

    public function update(Request $request): UserResource
    {
        /** @var User $user */
        $user = $request->user();

        $data = $request->all();

        $this->profileService->update($user, $data);

        return new UserResource($user);
    }

    public function getDiabeticValue(Request $request): bool
    {
        /** @var User $user */
        $user = $request->user();

        return $user->patient->is_diabetic;
    }

    public function getCities(): AnonymousResourceCollection
    {
        $cities = City::get();

        return CityResource::collection($cities);
    }

    public function getHospitals(): AnonymousResourceCollection
    {
        $hospitals = Hospital::get();

        return HospitalResource::collection($hospitals);
    }

    public function getSpecialisations(): AnonymousResourceCollection
    {
        $specialisations = Specialisation::get();

        return SpecialisationResource::collection($specialisations);
    }

    public function uploadAvatar(UserAvatarRequest $request): void
    {
        /** @var User $user */
        $user = $request->user();
        $data = $request->validated();
        $user->media()->delete();
        $user->addMedia($data['avatar'])
            ->toMediaCollection('images');
    }

    public function getAvatar(Request $request): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = $request->user();
        return ImageResource::collection($user->media);
    }

    public function deleteAvatar(Request $request): void
    {
        /** @var User $user */
        $user = $request->user();
        $user->media()->delete();
    }
}
