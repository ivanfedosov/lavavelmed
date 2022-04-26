<?php

/**
 * @file EventServiceProvider.php
 * MonitoringListResource
 * @date 18.03.2021
 *
 */

namespace App\Providers;

use App\Models\Drug;
use App\Models\Patient;
use App\Observers\BmiObserver;
use App\Observers\CreateMedicationsForDrugs;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            CreateMedicationsForDrugs::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
       Patient::observe(BmiObserver::class);
       // Patient::observe();
       // Drug::observe(CreateMedicationsForDrugs::class);
    }
}
