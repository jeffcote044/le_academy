<?php

namespace App\Listeners;

use App\Events\NewResponseEvent;
use App\Notifications\CommentNotification;
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
     * @param  NewResponseEvent  $event
     * @return void
     */
    public function handle(NewResponseEvent $event)
    {
        if ($event->response->user->id == $event->teacher->id) {
            $userToNotify =  $event->response->commentable->user;
            
        }else{
            $userToNotify = $event->teacher;
            
        }

        $userToNotify->notify(new CommentNotification($event->response));
    }
}
