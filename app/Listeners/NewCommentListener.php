<?php

namespace App\Listeners;

use App\Events\NewCommentEvent;
use App\Notifications\CommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewCommentListener implements ShouldQueue
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

        $teacher = $event->comment->commentable->section->course->teacher;

        if ($event->comment->user->id != $teacher->id) {
            $teacher->notify(new CommentNotification($event->comment));

        }

    }
}
