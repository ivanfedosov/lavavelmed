<?php

declare(strict_types=1);

namespace Tests\Utils;

use App\Services\Sms\OneTimeCodeService;
use Tests\TestCase;

/**
 * @mixin TestCase
 */
trait SmsCodeMocker
{
    public function mockSmsCode(string $code): void
    {
        $mockService = $this->createMock(OneTimeCodeService::class);
        $mockService->method('sendCode')->willReturn($code);

        $this->app->bind(OneTimeCodeService::class, function () use ($mockService) {
            return $mockService;
        });
    }
}
