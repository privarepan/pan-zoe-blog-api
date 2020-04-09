<?php

namespace App\Observers;

use App\Models\Replies;

class RepliesObserver
{
    /**
     * Handle the replies "created" event.
     *
     * @param  \App\Models\Replies  $replies
     * @return void
     */
    public function created(Replies $replies)
    {
        $replies->UserCount->IncrementReply();
    }

    /**
     * Handle the replies "updated" event.
     *
     * @param  \App\Models\Replies  $replies
     * @return void
     */
    public function updated(Replies $replies)
    {
        //
    }

    /**
     * Handle the replies "deleted" event.
     *
     * @param  \App\Models\Replies  $replies
     * @return void
     */
    public function deleted(Replies $replies)
    {
        $replies->UserCount->DecrementReply();
        $replies->Topic()->decrement('reply_count');
    }

    /**
     * Handle the replies "restored" event.
     *
     * @param  \App\Models\Replies  $replies
     * @return void
     */
    public function restored(Replies $replies)
    {
        //
    }

    /**
     * Handle the replies "force deleted" event.
     *
     * @param  \App\Models\Replies  $replies
     * @return void
     */
    public function forceDeleted(Replies $replies)
    {
        //
    }
}
