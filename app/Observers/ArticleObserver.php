<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Subscription;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendMailSubsciberNotification;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        $subscriber = Subscription::all();
        $details = [
            'greeting' => "Hi, This is a notification from the blog",
            'line' => "New article has been published",
            'actiontext' => "View Article",
            'actionlink' => url('/api/articles/'.$article->id),
            'lastline' => "Thank you for using our application",
        ];
        Notification::send($subscriber, new SendMailSubsciberNotification($details));
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        //
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
