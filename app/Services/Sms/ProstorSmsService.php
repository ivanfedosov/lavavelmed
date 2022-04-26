<?php

/**
 * @file ProstorSmsService.php
 * MonitoringListResource
 * @date 24.03.2021
 *
 */

declare(strict_types=1);

namespace App\Services\Sms;

use Illuminate\Support\Facades\Http;

class ProstorSmsService
{
    private const SEND_METHOD_PATH = '/messages/v2/send/';

    public function __construct(
        protected string $login,
        protected string $password,
        protected string $sender,
    ) {}

    /**
     * @psalm-pure
     */
    protected function preparePhone(string $phone): string
    {
        return preg_replace('/[^0-9+]/', '', $phone);
    }

    public function sendMessage(string $phone, string $text): string
    {
        $response = Http::get(
            url: config('sms.host') . self::SEND_METHOD_PATH,
            query: [
                'login' => $this->login,
                'password' => $this->password,
                'sender' => $this->sender,
                'phone' => $this->preparePhone($phone),
                'text' => $text,
            ],
        );

        return $response->body();
    }
}
