<?php

/**
 * @file api.php
 * MonitoringListResource
 * @date 18.03.2021
 *
 */

declare(strict_types=1);

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\DrugController;
use App\Http\Controllers\Api\MedicationController;
use App\Http\Controllers\Api\MonitoringController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\PatientApproveController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ResearchController;
use App\Http\Controllers\Api\StatisticsController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('cities', [ProfileController::class, 'getCities']);
Route::get('hospitals', [ProfileController::class, 'getHospitals']);
Route::get('specialisations', [ProfileController::class, 'getSpecialisations']);

Route::group(
    [
        'prefix' => 'auth',
        'namespace' => '\App\Http\Controllers\Api\Auth',
    ],
    static function () {
        Route::post('recognize', [AuthController::class, 'recognize']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);

        Route::group(
            ['middleware' => 'auth:sanctum'],
            static function () {
                Route::post('refresh', [AuthController::class, 'refreshToken']);
                Route::post('logout', [AuthController::class, 'logout']);
            }
        );
    }
);

Route::group(
    [
        'middleware' => 'auth:sanctum',
        'namespace' => '\App\Http\Controllers\Api',
    ],
    static function () {
        Route::group(
            ['prefix' => 'profile'],
            static function () {
                Route::post('/', [ProfileController::class, 'update']);
                Route::get('/', [ProfileController::class, 'index']);
                Route::get('/diabetic', [ProfileController::class, 'getDiabeticValue']);
                Route::post('/avatar', [ProfileController::class, 'uploadAvatar']);
                Route::get('/avatar', [ProfileController::class,'getAvatar']);
                Route::delete('/avatar', [ProfileController::class,'deleteAvatar']);
            }
        );

        Route::group(
            ['prefix' => 'monitoring'],
            static function () {
                Route::post('/', [MonitoringController::class, 'store']);
                Route::get('/', [MonitoringController::class, 'index']);
                Route::get('/lastvalues', [MonitoringController::class, 'getLastMonitoringValues']);
                Route::delete('/{monitoring}', [MonitoringController::class, 'destroy']);
            }
        );

        Route::group(
            [
                'prefix' => 'drug',
            ],
            static function () {
                Route::get('/', [DrugController::class, 'index']);
                Route::get('/{drug}', [DrugController::class, 'show']);
                Route::post('/', [DrugController::class, 'create']);
                Route::put('/{drug}', [DrugController::class, 'update']);
                Route::delete('/{drug}', [DrugController::class, 'destroy']);
            }
        );

        Route::group(
            [
                'prefix' => 'medication',
            ],
            static function () {
                Route::get('/', [MedicationController::class, 'index']);
                Route::put('/', [MedicationController::class, 'medicationListUpdate']);
                Route::get('/months', [MedicationController::class, 'getMonthList']);
                Route::get('/{medication}', [MedicationController::class, 'show']);
                Route::post('/', [MedicationController::class, 'create']);
                Route::put('/{medication}', [MedicationController::class, 'update']);
                Route::delete('/{medication}', [MedicationController::class, 'destroy']);
            }
        );

        Route::group(
            [
                'prefix' => 'news',
            ],
            static function () {
                Route::get('/', [NewsController::class, 'index']);
                Route::get('/{news}', [NewsController::class, 'show']);
            }
        );

        Route::group(
            [
                'prefix' => 'blog',
            ],
            static function () {
                Route::get('/', [NewsController::class, 'targetNews']);
                Route::get('/favorite', [NewsController::class, 'showFavoriteNews']);
                Route::post('/favorite/{news}', [NewsController::class, 'addNewsToUserFavorites']);
                Route::delete('/favorite/{news}', [NewsController::class, 'deleteNewsFromUserFavorites']);
            }
        );

        Route::group(
            [
                'prefix' => 'calendar',
            ],
            static function () {
                //TODO: метод роута
                Route::get('/', [DoctorController::class, 'calendar']);
                Route::post('/add', [DoctorController::class, 'addConsultation']);
            }
        );

        Route::group(
            [
                'prefix' => 'patients',
                'middleware' => 'check.doctor',
            ],
            static function () {
                //TODO: метод роута
                Route::get('/', [DoctorController::class, 'patients']);
                Route::get('/{user}', [DoctorController::class, 'getPatientCard']);
                Route::get('/{user}/medications', [DoctorController::class, 'getPatientMedications']);
                Route::get('/{user}/monitoring', [DoctorController::class, 'getPatientsMonitoring']);
                Route::get('/{user}/categories', [DoctorController::class, 'getPatientsResearchCategories']);
                Route::get('/{user}/categories/{category}', [DoctorController::class, 'getPatientsResearchCategory']);
                Route::get('/{user}/categories/{category}/{research}', [DoctorController::class, 'getPatientsDetailResearch']);
                //TODO: метод роута
                Route::post('/approve/{patient}', [PatientApproveController::class, 'approvePatient']);
            }
        );

        Route::group(
            [
                'prefix' => 'doctors',
                'middleware' => 'check.patient',
            ],
            static function () {
                Route::get('/', [PatientApproveController::class, 'doctorsList']);
                Route::get('/my', [PatientController::class, 'getRelatedDoctor']);
                Route::post('/request/{user}', [PatientApproveController::class, 'sendRequestForApprove']);
            }
        );

        Route::group(
            [
                'prefix' => 'consultations',
            ],
            static function () {
                //TODO: метод роута
                Route::get('/', [ConsultationController::class, 'patientsConsultations']);
            }
        );

        Route::group(
            [
                'prefix' => 'statistics',
                'middleware' => ['check.doctor'],
            ],
            static function () {
                Route::get('/', [StatisticsController::class, 'index']);
                Route::get('/month', [StatisticsController::class, 'getStatisticsByLastMonth']);
                Route::get('/{patient}', [StatisticsController::class, 'show']);
            }
        );
        Route::group(
            [
                'prefix' => 'category',
            ],
            static function () {
                Route::get('/', [CategoryController::class, 'index']);
                Route::get('/{category}', [CategoryController::class, 'show']);
                Route::put('/{category}', [CategoryController::class, 'update']);
                Route::post('/', [CategoryController::class, 'create']);
                Route::delete('/{category}', [CategoryController::class, 'destroy']);
            }
        );

        Route::group(
            [
                'prefix' => 'research',
            ],
            static function () {
                Route::get('/', [ResearchController::class, 'index']);
                Route::get('/{research}', [ResearchController::class, 'show']);
                Route::post('/', [ResearchController::class, 'create']);
                Route::post('/{research}', [ResearchController::class, 'update']);
                Route::delete('/{research}', [ResearchController::class, 'destroy']);
            }
        );
    }
);

Route::get(
    '/',
    function () {
        return Response::HTTP_OK;
    }
);
