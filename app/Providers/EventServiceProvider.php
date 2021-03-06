<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\ArticlesEvents;
use App\Listeners\ArticleNotification;
use App\Events\CarsEvents;
use App\Listeners\CarNotification;
use App\Events\ArticleCreated;
use App\Events\ArticleUpdated;
use App\Events\ArticleDeleted;
use App\Listeners\SendArticleCreatedNotification;
use App\Listeners\SendArticleUpdatedNotification;
use App\Listeners\SendArticleDeletedNotification;

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
        ArticlesEvents::class => [
            ArticleNotification::class,
        ],
        CarsEvents::class => [
            CarNotification::class,
        ],
        ArticleCreated::class => [
            SendArticleCreatedNotification::class,
        ],
        ArticleUpdated::class => [
            SendArticleUpdatedNotification::class,
        ],
        ArticleDeleted::class => [
            SendArticleDeletedNotification::class,
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
