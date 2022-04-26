<?php

/**
 * @file OneTimeCodeService.php
 * MonitoringListResource
 * @date 19.04.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Sms;

use App\Models\Code;
use Log;

class OneTimeCodeService
{
    protected ProstorSmsService $smsService;

    public function __construct()
    {
        $this->smsService = new ProstorSmsService(
            login: config('sms.api.login'),
            password: config('sms.api.password'),
            sender: config('sms.api.sender'),
        );
    }

    public function generateCode(): string
    {
        try {
            $code = (string) random_int(1000, 9999);
        } catch (\Exception $e) {
            Log::error('RegistrationService::generateOneTimeCode() error: ' . $e->getMessage());
        }

        return $code ?? config('sms.service_code');
    }

    public function sendCode(string $phone): string
    {
        $code = $this->generateCode();

//        $this->smsService->sendMessage(
//            phone: $phone,
//            text: __('auth.authorization.one_time_code_message') . $code
//        );

        Code::create(
            [
                'phone' => $phone,
                'value' => $code,
            ]
        );

        return $code;
    }
}
