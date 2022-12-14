<?php

namespace App\Providers;

use App\Events\ConfirmDayOff;
use App\Events\CreateClassNotification;
use App\Events\CreateFingerprint;
use App\Events\ResetPassword;
use App\Events\RequestDayOff;
use App\Listener\SendMailResetPassword;
use App\Listeners\CreateFingerprintListener;
use App\Listeners\CreateUserWorkingDetails;
use App\Listeners\SaveClassNotification;
use App\Listeners\sendConfirmDayOffNotification;
use App\Listeners\SendDayOffNotification;
use App\Notifications\RequestDayOffNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ResetPassword::class => [
            SendMailResetPassword::class
        ],
        RequestDayOff::class => [
            SendDayOffNotification::class
        ],
        ConfirmDayOff::class => [
            sendConfirmDayOffNotification::class
        ],
        CreateClassNotification::class=>[
            SaveClassNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
