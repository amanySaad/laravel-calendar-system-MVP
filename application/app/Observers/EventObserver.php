<?php

namespace App\Observers;

use App\Mail\EventCreatedEmail;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        $this->sendMailable($event, EventCreatedEmail::class);
    }

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        //
    }
    private function sendMailable(Event $event, $mailable)
    {
        $invitees = (is_null($event->invitees)) ? [] : json_decode($event->invitees);
        if(!empty($invitees)){
            foreach ($invitees as $invitee) {
                Mail::to($invitee)->send(
                    new $mailable($event)
                );
            }
        }

    }
}
