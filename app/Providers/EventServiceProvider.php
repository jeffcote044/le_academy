<?php

namespace App\Providers;

use App\Events\NewCommentEvent;
use App\Events\NewResponseEvent;
use App\Listeners\NewCommentListener;
use App\Listeners\NewResponseListener;
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
        ],
        NewCommentEvent::class => [
            NewCommentListener::class,
        ],
        NewResponseEvent::class => [
            NewResponseListener::class,
        ],
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
}
