<?php

/**
 * @file LoginService.php
 * MonitoringListResource
 * @date 29.03.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\Code;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\Sms\OneTimeCodeService;
use Exception;
use Illuminate\Support\Arr;
use Throwable;

class LoginService
{
    public function __construct(
        private UserRepository $userRepository,
        private OneTimeCodeService $oneTimeCodeService,
    ) {}

    public function recognizeUser(string $phone): array
    {
        $user = $this->userRepository->getByPhone($phone);

        //TODO: type как константа
        $type = 'login';

        if (!$user) {
            $type = 'register';
        }

        $code = $this->oneTimeCodeService->sendCode(phone: $phone);

        return [
            'code' => $code,
            'type' => $type,
        ];
    }

    /**
     * @throws Exception
     */
    public function login(array $data): array
    {
        $code = Code::where('phone', Arr::get($data, 'phone'))
                    ->orderBy('created_at', 'desc')
                    ->first();

        if (!$code) {
            throw new \App\Services\Auth\Exceptions\NoAuthorizationCodesException();
        }

        if (Arr::get($data, 'code') !== (string) $code->getAttribute('value')) {
            throw new \App\Services\Auth\Exceptions\InvalidOneTimeCodeException();
        }

        $user = $this->userRepository->getByPhone(Arr::get($data, 'phone'));

        if (!$user) {
            throw new \App\Services\Auth\Exceptions\UserNotFoundException();
        }

        $this->userRepository->removeAllCodes($user->getAttribute('phone'));

        $tokenName = Arr::get($data, 'token_name', 'Bearer Token');
        $token = $user->createToken(name: $tokenName)->plainTextToken;

        auth()->login($user);

        return ['data' => ['token' => $token, 'account_type' => $user->getAttribute('account_type')]];
    }

    /**
     * @throws Throwable
     */
    public function logout(User $user): void
    {
        $this->userRepository->removeAllCodes($user->phone);
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
    }
}
