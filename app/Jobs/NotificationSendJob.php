<?php

/**
 * @file NotificationSendJob.php
 * MonitoringListResource
 * @date 02.06.2021
 *
 */

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Drug;
use App\Models\Medication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use JsonException;
use OneSignal;

class NotificationSendJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private Drug $drug
    ) {
    }

    /**
     * @throws JsonException
     */
    public function handle(): void
    {
        $timers = json_decode(
            $this->drug->getAttribute('timers'),
            true,
            512,
            JSON_THROW_ON_ERROR,
        );

        if ($timers === []) {
            return;
        }

        $notificationParameters = [
            'api_key' => config('onesignal.rest_api_key'),
            'app_id'  => config('onesignal.app_id'),

            'contents' => [
                'en' => '',
                'ru' => '',
            ],
        ];

        foreach ($this->drug->patient->onesignalPlayers as $onesignal) {
            $notificationParameters['include_player_ids'][] = $onesignal->getAttribute('player_id');
        }

        foreach ($timers as $time) {
            //TODO:
            $medication = Medication::where(
                [
                    ['patient_id', $this->drug->getAttribute('patient_id')],
                    ['drug_id', $this->drug->getAttribute('id')],
                    ['date', now()->setTimeFromTimeString($time)],
                ]
            )->first();

            //TODO:
            if ($medication->exists()) {
                continue;
            }

            $notificationParameters['contents']['en'] = sprintf(
                __('drugs.notification_message', '', 'en'),
                $this->drug->getAttribute('title'),
                $time
            );

            $notificationParameters['contents']['ru'] = sprintf(
                __('drugs.notification_message', '', 'ru'),
                $this->drug->getAttribute('title'),
                $time
            );

            $jsonResponse = OneSignal::sendNotificationCustom($notificationParameters)->getBody();
            $response = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);

            $medication = Medication::create(
                [
                    'patient_id'      => $this->drug->getAttribute('patient_id'),
                    'drug_id'         => $this->drug->getAttribute('id'),
                    'notification_id' => Arr::get($response, 'id', '0'),
                    'date'            => now()->setTimeFromTimeString($time),
                    'status'          => Medication::AWAIT,
                ],
            );

            $playerIds = json_encode($notificationParameters['include_player_ids']);

            Log::alert(
                "User: {$this->drug->patient->user->full_name},
                Response: $jsonResponse, Medication: $medication->id,
                Notification ids: $playerIds"
            );
        }
    }
}
