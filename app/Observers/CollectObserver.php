<?php

namespace App\Observers;

use App\Models\Collect;

class CollectObserver
{
    /**
     * Handle the collect "created" event.
     *
     * @param  \App\Models\Collect  $collect
     * @return void
     */
    public function created(Collect $collect)
    {
        $collect->UserCount->IncrementCollect();
    }

    /**
     * Handle the collect "updated" event.
     *
     * @param  \App\Models\Collect  $collect
     * @return void
     */
    public function updated(Collect $collect)
    {
        //
    }

    /**
     * Handle the collect "deleted" event.
     *
     * @param  \App\Models\Collect  $collect
     * @return void
     */
    public function deleted(Collect $collect)
    {
        $collect->UserCount->DecrementCollect();
    }

    /**
     * Handle the collect "restored" event.
     *
     * @param  \App\Models\Collect  $collect
     * @return void
     */
    public function restored(Collect $collect)
    {
        //
    }

    /**
     * Handle the collect "force deleted" event.
     *
     * @param  \App\Models\Collect  $collect
     * @return void
     */
    public function forceDeleted(Collect $collect)
    {
        //
    }
}
