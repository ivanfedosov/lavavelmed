<?php

/**
 * @file EveryDayDrugsSearchJob.php
 * MonitoringListResource
 * @date 02.06.2021
 *
 */

namespace App\Jobs;

use App\Models\Drug;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EveryDayDrugsSearchJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function handle(): void
    {
        self::dispatch()->onQueue('searchDrugs')->delay(now()->addSeconds(10));

        $endOfDay = now()->endOfDay()->toDateTimeString();

        $drugs = Drug::whereDate(
            'end_date',
            '>=',
            $endOfDay,
        )->get();

        if ($drugs->isEmpty()) {
            return;
        }

        foreach ($drugs as $drug) {
            if ($drug->patient->onesignalPlayers->isEmpty()) {
                continue;
            }

            NotificationSendJob::dispatch($drug)
                ->onQueue('sendNotification')
                ->afterCommit();
        }
    }
}
