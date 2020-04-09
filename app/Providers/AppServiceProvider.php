<?php

namespace App\Providers;

use App\Models\Collect;
use App\Models\Comment;
use App\Models\Replies;
use App\Models\Star;
use App\Models\Topic;
use App\Models\Zan;
use App\Observers\CollectObserver;
use App\Observers\CommentObserver;
use App\Observers\RepliesObserver;
use App\Observers\StarObserver;
use App\Observers\TopicObserver;
use App\Observers\ZanObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Replies::observe(RepliesObserver::class);
        Topic::observe(TopicObserver::class);
        Zan::observe(ZanObserver::class);
        Collect::observe(CollectObserver::class);
        Star::observe(StarObserver::class);
    }
}
