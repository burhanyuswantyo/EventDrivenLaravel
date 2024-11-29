<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\SendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        echo 'Mengirim email ke ' . $event->user['email'];
        Mail::to($event->user['email'])->send(new SendEmail($event->user));
    }
}
