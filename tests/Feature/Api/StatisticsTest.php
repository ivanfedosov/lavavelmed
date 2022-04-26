<?php

/**
 * @file StatisticsTest.php
 *
 * @date 03.11.2021
 *
 */

declare(strict_types=1);

namespace Feature\Api;

/*
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Database\Factories\TestFactory\ConsultationTestFactory;
use Database\Factories\TestFactory\DoctorTestFactory;
use Database\Factories\TestFactory\PatientTestFactory;
use Database\Factories\TestFactory\UserTestFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
*/
use Tests\TestCase;

class StatisticsTest extends TestCase
{
    /*
    use RefreshDatabase;

    private const STATISTICS_INDEX = 'api/statistics/';
    private const STATISTICS_SHOW = 'api/statistics/%d';
    private const STATISTICS_MONTH = 'api/statistics/month';

    private const STATISTICS_STRUCTURE = [
        'data' => [
            '*' => [
                'id',
                'title',
                'date',
                'patient' => [
                    'id',
                    'user' => [
                        'full_name',
                        'phone',
                    ],
                ],
            ],
        ],
    ];


    public function testForbiddenAccessToRouteStatistics(): void
    {
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        Sanctum::actingAs($userPatient);

        $response = $this->getJson(self::STATISTICS_INDEX);

        $response->assertStatus(403);
    }

    public function testGetAllStatisticsWillResultSuccess(): void
    {
        $userDoctor = $this->UserFactoryCreate(User::DOCTOR);
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $doctor = $this->doctorFactoryCreate($userDoctor);

        $patient = $this->patientFactoryCreate($userPatient);

        $this->consultationFactoryCreate($doctor, $patient);

        Sanctum::actingAs($userDoctor);

        $this->getJson(self::STATISTICS_INDEX)
            ->assertOK()
            ->assertJsonStructure(self::STATISTICS_STRUCTURE);
    }

    public function testGetStatisticsByOneUserWillResultSuccess(): void
    {
        $userDoctor = $this->UserFactoryCreate(User::DOCTOR);
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $doctor = $this->doctorFactoryCreate($userDoctor);

        $patient = $this->patientFactoryCreate($userPatient);

        $this->consultationFactoryCreate($doctor, $patient);

        Sanctum::actingAs($userDoctor);

        $response = $this->getJson(sprintf(self::STATISTICS_SHOW, $patient->id));

        $response->assertOK();
        $response->assertJsonStructure(self::STATISTICS_STRUCTURE);
    }

    public function testGetAllStatisticsByMonthWillResultSuccess(): void
    {
        $userDoctor = $this->UserFactoryCreate(User::DOCTOR);
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $doctor = $this->doctorFactoryCreate($userDoctor);

        $patient = $this->patientFactoryCreate($userPatient);

        $this->consultationFactoryCreate($doctor, $patient);

        Sanctum::actingAs($userDoctor);

        $response = $this->getJson(self::STATISTICS_MONTH);

        $response->assertOK();
        $response->assertJsonStructure(self::STATISTICS_STRUCTURE);
    }

    public function testGetAllStatisticsWillResultFail(): void
    {
        $userDoctor = $this->UserFactoryCreate(User::DOCTOR);
        $userDoctor2 = $this->UserFactoryCreate(User::DOCTOR);

        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $doctor = $this->doctorFactoryCreate($userDoctor);

        $this->doctorFactoryCreate($userDoctor2);

        $patient = $this->patientFactoryCreate($userPatient);

        $this->consultationFactoryCreate($doctor, $patient);

        Sanctum::actingAs($userDoctor2);

        $response = $this->getJson(self::STATISTICS_INDEX);

        $response->assertOK();
        $response->assertJson([
            'data' => [],
        ]);
    }

    public function testGetStatisticsByOneUserWillResultFail(): void
    {
        $userDoctor = $this->UserFactoryCreate(User::DOCTOR);
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $doctor = $this->doctorFactoryCreate($userDoctor);

        $patient = $this->patientFactoryCreate($userPatient);

        $this->consultationFactoryCreate($doctor, $patient);

        Sanctum::actingAs($userDoctor);

        $response = $this->getJson(sprintf(self::STATISTICS_SHOW, $patient->id + 1));

        $response->assertStatus(404);
    }

    public function testGetAllStatisticsByMonthWillResultFail(): void
    {
        $userDoctor = $this->UserFactoryCreate(User::DOCTOR);
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $doctor = $this->doctorFactoryCreate($userDoctor);

        $patient = $this->patientFactoryCreate($userPatient);

        $this->consultationFactoryCreate($doctor, $patient, false);

        Sanctum::actingAs($userDoctor);

        $response = $this->getJson(self::STATISTICS_MONTH);

        $response->assertOK();
        $response->assertJson([
            'data' => [],
        ]);
    }

    private function userFactoryCreate(int $accountType): User
    {
        return UserTestFactory::new()->create(
            [
                'account_type' => $accountType,
            ]
        );
    }

    private function doctorFactoryCreate(User $user): Doctor
    {
        return DoctorTestFactory::new()->create(
            [
                'user_id' => $user->id,
            ]
        );
    }

    private function patientFactoryCreate(User $user): Patient
    {
        return PatientTestFactory::new()->create(
            [
                'user_id' => $user->id,
            ]
        );
    }

    private function consultationFactoryCreate(Doctor $doctor, Patient $patient, bool $isDateNow = true): Consultation
    {
        if ($isDateNow === null) {
            $date = Carbon::now()->format('Y-m-d h:i:s');
        } else {
            $date = Carbon::now()->subMonths(2)->format('Y-m-d h:i:s');
        }

        return ConsultationTestFactory::new()->create(
            [
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
                'date' => $date,
            ]
        );
    }
    */
}
