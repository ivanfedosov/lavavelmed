<?php

/**
 * @file ProfileService.php
 * MonitoringListResource
 * @date 07.05.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Profile;

use App\Models\Patient;
use App\Models\User;
use App\Validators\Profile\DoctorValidator;
use App\Validators\Profile\PatientValidator;
use App\Validators\Profile\UserValidator;
use Illuminate\Validation\ValidationException;
use Throwable;

class ProfileService
{
    /**
     * @throws ValidationException
     * @throws Throwable
     */

    public static function handle(Patient $patient): Patient
    {
        return (new static())->checkProfileFilling($patient);
    }

    public function update(User $user, array $data): array
    {
        $userFields = UserValidator::validate($data);
        $doctorFields = DoctorValidator::validate($data);
        $patientFields = PatientValidator::validate($data);

        if ($userFields !== []) {
            $user->update($userFields);
        }

        if ($doctorFields  !== [] && $user->getAttribute('account_type') === User::DOCTOR) {
            $user->doctor->update($doctorFields);
        } elseif ($patientFields !== [] && $user->getAttribute('account_type') === User::PATIENT) {
            $user->patient->update($patientFields);
            $this->checkProfileFilling($user->patient);
        }

        return array_merge_recursive(
            $userFields,
            $doctorFields,
            $patientFields,
        );
    }

    public function checkProfileFilling(Patient $patient): Patient
    {
        if ($patient->getAttribute('is_diabetic') !== null && $patient->getAttribute('height') !== null && $patient->getAttribute('max_weight') !== null) {
            $patient->setAttribute('is_profile_filled', true);
        } else {
            $patient->setAttribute('is_profile_filled', false);
        }

        return $patient;
    }
}
