<?php

namespace App\Observers;

use App\Models\Star;

class StarObserver
{
    /**
     * Handle the star "created" event.
     *
     * @param  \App\Models\Star  $star
     * @return void
     */
    public function created(Star $star)
    {
        $star->Stars->IncrementStar();
        $star->Fans->IncrementFans();
    }

    /**
     * Handle the star "updated" event.
     *
     * @param  \App\Models\Star  $star
     * @return void
     */
    public function updated(Star $star)
    {
        //
    }

    /**
     * Handle the star "deleted" event.
     *
     * @param  \App\Models\Star  $star
     * @return void
     */
    public function deleted(Star $star)
    {
        $star->Stars->DecrementStar();
        $star->Fans->DecrementFans();
    }

    /**
     * Handle the star "restored" event.
     *
     * @param  \App\Models\Star  $star
     * @return void
     */
    public function restored(Star $star)
    {
        //
    }

    /**
     * Handle the star "force deleted" event.
     *
     * @param  \App\Models\Star  $star
     * @return void
     */
    public function forceDeleted(Star $star)
    {
        //
    }
}
