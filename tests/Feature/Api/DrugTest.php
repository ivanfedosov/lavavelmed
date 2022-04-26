<?php

/**
 * @file DrugTest.php
 *
 * @date 12.11.2021
 *
 */

declare(strict_types=1);

namespace Feature\Api;

/*
use App\Models\Drug;
use App\Models\Patient;
use App\Models\User;
use Database\Factories\TestFactory\DrugTestFactory;
use Database\Factories\TestFactory\PatientTestFactory;
use Database\Factories\TestFactory\UserTestFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

*/
use Tests\TestCase;

class DrugTest extends TestCase
{
    /*
    use RefreshDatabase;

    private const DRUG_INDEX = 'api/drug/';
    private const DRUG_SHOW = 'api/drug/%d';
    private const DRUG_CREATE = 'api/drug/';
    private const DRUG_UPDATE = 'api/drug/%d';
    private const DRUG_DELETE = 'api/drug/%d';

    private const DRUG_LIST_STRUCTURE = [
        'data' => [
            '*' => [
                'id',
                'patient_id',
                'title',
                'dosage',
                'frequency',
                'timers',
                'planned',
                'start_date',
                'end_date',
            ],
        ],
    ];

    private const DRUG_STRUCTURE = [
        'data' => [
            'id',
            'patient_id',
            'title',
            'dosage',
            'frequency',
            'timers',
            'planned',
            'start_date',
            'end_date',
        ],
    ];

    private const DRUG_DATA = [
        'title' => 'test',
        'planned' => 'test',
        'dosage' => '100 мл',
        'timers' => '12:10, 13:20, 14:30',
        'frequency' => '1 раз в день',
        'start_date' => '1636640564',
        'end_date' => '1636640564',
    ];

    public function testGetAllDrugs(): void
    {
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $patient = $this->patientFactoryCreate($userPatient);

        $this->drugFactoryCreate($patient->id);

        Sanctum::actingAs($userPatient);

        $response = $this->getJson(self::DRUG_INDEX);

        $response->assertOK();
        $response->assertJsonStructure(self::DRUG_LIST_STRUCTURE);
    }

    public function testGetOneDrug(): void
    {
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $patient = $this->patientFactoryCreate($userPatient);

        $drug = $this->drugFactoryCreate($patient->id);

        Sanctum::actingAs($userPatient);

        $response = $this->getJson(sprintf(self::DRUG_SHOW, $drug->id));

        $response->assertOK();
        $response->assertJsonStructure(self::DRUG_STRUCTURE);
    }

    public function testCreateDrug(): void
    {
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $this->patientFactoryCreate($userPatient);

        Sanctum::actingAs($userPatient);

        $response = $this->postJson(self::DRUG_CREATE, self::DRUG_DATA);

        $response->assertOK();
    }

    public function testUpdateDrug(): void
    {
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $patient = $this->patientFactoryCreate($userPatient);

        $drug = $this->drugFactoryCreate($patient->id);

        Sanctum::actingAs($userPatient);

        $response = $this->putJson(sprintf(self::DRUG_SHOW, $drug->id), self::DRUG_DATA);

        $response->assertOK();
    }

    public function testDeleteDrug(): void
    {
        $userPatient = $this->UserFactoryCreate(User::PATIENT);

        $patient = $this->patientFactoryCreate($userPatient);

        $drug = $this->drugFactoryCreate($patient->id);

        Sanctum::actingAs($userPatient);

        $response = $this->deleteJson(sprintf(self::DRUG_SHOW, $drug->id));

        $response->assertOK();
    }

    private function userFactoryCreate(int $accountType): User
    {
        return UserTestFactory::new()->create(
            [
                'account_type' => $accountType,
            ]
        );
    }

    private function drugFactoryCreate(int $patientId): Drug
    {
        return DrugTestFactory::new()->create(
            [
                'patient_id' => $patientId,
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
    */
}
