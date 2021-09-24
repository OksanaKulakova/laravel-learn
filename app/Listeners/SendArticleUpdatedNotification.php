<?php

namespace App\Listeners;

use App\Events\ArticleUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleUpdated as MailArticleUpdated;

class SendArticleUpdatedNotification
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
     * @param  ArticleUpdated  $event
     * @return void
     */
    public function handle(ArticleUpdated $event)
    {
        if ($email = config('mail.reply_to.address')) {
            Mail::to($email)->send(new MailArticleUpdated($event->article));
        }
    }
}
