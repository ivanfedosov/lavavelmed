<?php

/**
 * @file NotificationThroughHour.php
 *
 * @date 21.10.2021
 *
 */

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Patient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotificationThroughHour implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;


    public function __construct(
        private Patient $patient,
    ) {
    }

    public function handle(): void
    {
        $notificationParameters = [
            'api_key' => config('onesignal.rest_api_key'),
            'app_id' => config('onesignal.app_id'),

            'contents' => [
                "en" => '',
                "ru" => '',
            ],
        ];

        foreach ($this->patient->onesignalPlayers as $onesignal) {
            $notificationParameters['include_player_ids'][] = $onesignal->getAttribute('player_id');
        }
        $notificationParameters['contents']['ru'] = 'drugs.notification_message_2';
//            OneSignal::sendNotificationCustom($notificationParameters);
    }
}
