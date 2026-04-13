<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache; 
use App\Mail\AlertaLoginCorreo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnviarCorreo
{
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
    public function handle(Login $event): void
    {
        $user = $event->user; 
        $key = 'login_' . $user->id; 

        if (Cache::has($key)) {
            return;
        }

        Cache::put($key, true, now()->addSeconds(10));

        Mail::to($user->email)->send(new AlertaLoginCorreo($user));
    }
}
