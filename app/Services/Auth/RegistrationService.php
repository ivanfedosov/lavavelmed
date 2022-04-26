<?php

/**
 * @file RegistrationService.php
 * MonitoringListResource
 * @date 25.03.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Auth;

use App\Jobs\NotificationsForPatientsJob;
use App\Models\Code;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\Sms\OneTimeCodeService;
use Exception;
use Illuminate\Support\Arr;

class RegistrationService
{
    public function __construct(
        private UserRepository $userRepository,
        private OneTimeCodeService $oneTimeCodeService,
    ) {
    }

    /**
     * @throws Exception
     */
    public function createUser(array $data): \Illuminate\Database\Eloquent\Model
    {
        $phone = Arr::get($data, 'phone');

        $code = Code::where('phone', $phone)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$code) {
            throw new \App\Services\Auth\Exceptions\NoAuthorizationCodesException();
        }

        if (Arr::get($data, 'code') !== (string) $code->getAttribute('value')) {
            throw new \App\Services\Auth\Exceptions\InvalidOneTimeCodeException();
        }

        //TODO: сделать ивент который будет по UserCreated находить номера кодов и удалять
        $this->userRepository->removeAllCodes($phone);
        $user = $this->userRepository->create($data);
        $this->assignRole($user->id, (int) $user->getAttribute('account_type'));

        if ($user->getAttribute('account_type') === User::PATIENT) {
            NotificationsForPatientsJob::dispatch($user->id)
                ->onQueue('sendNotification');
        }

        return $user;
    }

    public function assignRole(int $userId, int $role): void
    {
        if ($role === User::DOCTOR) {
            Doctor::create([
                'user_id' => $userId,
                'is_activated' => false,
            ]);
        } elseif ($role === User::PATIENT) {
            Patient::create([
                'user_id' => $userId,
            ]);
        }
    }

    public function generateToken(int $userId, string $name = 'Bearer Token'): string
    {
        $model = $this->userRepository->getModel();
        $user = $model->findOrFail($userId);

        $this->oneTimeCodeService->generateCode();

        return $user->createToken($name)->plainTextToken;
    }
}
