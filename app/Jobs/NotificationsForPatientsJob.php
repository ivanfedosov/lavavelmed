<?php

/**
 * @file NotificationWithOutSelectedTypeJob.php
 *
 * @date 20.10.2021
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

class NotificationsForPatientsJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;


    public function __construct(
        private int $userId,
    ) {
    }

    public function handle(): void
    {
        $time = 15;
        $patient = Patient::whereUserId($this->userId)->first();

        $notificationParameters = [
            'api_key' => config('onesignal.rest_api_key'),
            'app_id'  => config('onesignal.app_id'),

            'contents' => [
                "en" => '',
                "ru" => '',
            ],
        ];

        $date = $patient->getAttribute('operation_date');
        $type = $patient->getAttribute('operation_type');
        $userId = $patient->getAttribute('user_id');

        match ($patient) {
            $type !== null &&  $date !== null  => $this->setPushesForTypeAndDate($userId),
            $type !== null &&  $date === null => $this->setPushesWithoutDate($userId),
            default => $this->setPushesWithoutTypeAndDate($patient),
        };

        self::dispatch($this->userId)
            ->onQueue('sendNotification')
            ->delay($time);
    }

    public function setPushesWithoutTypeAndDate(Patient $patient)
    {
            $notificationParameters['include_player_ids'][] = $patient->onesignalPlayers->getAttribute('player_id');

        $notificationParameters['contents']['ru'] = 'drugs.notification_message_1';
//            OneSignal::sendNotificationCustom($notificationParameters);
        NotificationThroughHour::dispatch($patient)
            ->onQueue('sendNotification')
            ->delay(3600);
    }

    public function setPushesWithoutDate($userId)
    {
    }

    public function setPushesForTypeAndDate($userId)
    {
    }
}
