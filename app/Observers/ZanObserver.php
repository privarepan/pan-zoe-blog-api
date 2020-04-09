<?php

namespace App\Observers;

use App\Models\Topic;
use App\Models\Zan;

class ZanObserver
{
    /**
     * Handle the zan "created" event.
     *
     * @param  \App\Models\Zan  $zan
     * @return void
     */
    public function created(Zan $zan)
    {
        if ($zan->zan_type === Topic::class) {
            $origin = $zan->Origin;
            $origin->UserCount->IncrementZan();
        }
    }

    /**
     * Handle the zan "updated" event.
     *
     * @param  \App\Models\Zan  $zan
     * @return void
     */
    public function updated(Zan $zan)
    {
        //
    }

    /**
     * Handle the zan "deleted" event.
     *
     * @param  \App\Models\Zan  $zan
     * @return void
     */
    public function deleted(Zan $zan)
    {
        if ($zan->zan_type === Topic::class) {
            $zan->Origin->UserCount->DecrementZan();
        }
    }

    /**
     * Handle the zan "restored" event.
     *
     * @param  \App\Models\Zan  $zan
     * @return void
     */
    public function restored(Zan $zan)
    {
        //
    }

    /**
     * Handle the zan "force deleted" event.
     *
     * @param  \App\Models\Zan  $zan
     * @return void
     */
    public function forceDeleted(Zan $zan)
    {
        //
    }
}
