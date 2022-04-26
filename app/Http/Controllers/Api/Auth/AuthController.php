<?php

/**
 * @file AuthController.php
 * MonitoringListResource
 * @date 25.03.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\PhoneRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AuthController
{
    public function __construct(
        protected UserRepository $userRepository,
        protected RegistrationService $registrationService,
        protected LoginService $loginService,
    ) {
    }

    /**
     * @throws \Exception
     */
    public function register(RegisterRequest $request): array
    {
        $data = $request->validated();

        $user = $this->registrationService->createUser($data);

        $token = $this->registrationService->generateToken($user->getAttribute('id'));

        return ['data' => ['token' => $token]];
    }

    public function recognize(PhoneRequest $request): array
    {
        $phone = Arr::get($request->validated(), 'phone');
        $data = $this->loginService->recognizeUser($phone);

        return [
            'data' => [
                'code' => Arr::get($data, 'code'),
                'type' => Arr::get($data, 'type'),
            ],
        ];
    }

    /**
     * @throws \Exception
     */
    public function login(LoginRequest $request): array
    {
        $data = $request->validated();

        return $this->loginService->login($data);
    }

    public function logout(Request $request): void
    {
        $user = $request->user();

        $this->loginService->logout($user);
    }

    /**
     * @throws \Throwable
     */
    public function refreshToken(Request $request): array
    {
        $user = $request->user();

        throw_if(
            !$user,
            new \App\Services\Auth\Exceptions\UserNotFoundException(),
        );

        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return [
            'data' => [
                'token' => $user->createToken('api')->plainTextToken,
            ],
        ];
    }
}
