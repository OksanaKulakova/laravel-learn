<?php

namespace App\Listeners;

use App\Events\ArticlesEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class ArticleNotification
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
     * @param  ArticlesEvents  $event
     * @return void
     */
    public function handle(ArticlesEvents $event)
    {
        Cache::tags('articles')->flush();
    }
}
