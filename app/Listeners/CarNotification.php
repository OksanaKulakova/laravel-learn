<?php

namespace App\Listeners;

use App\Events\CarsEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CarNotification
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
     * @param  CarsEvents  $event
     * @return void
     */
    public function handle(CarsEvents $event)
    {
        Cache::tags('cars')->flush();
    }
}
