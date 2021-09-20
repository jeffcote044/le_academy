<?php

namespace App\Providers;

use App\Events\NewCommentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewResponseListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewCommentEvent  $event
     * @return void
     */
    public function handle(NewCommentEvent $event)
    {
        //
    }
}
