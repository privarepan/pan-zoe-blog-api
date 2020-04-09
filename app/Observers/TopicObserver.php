<?php

namespace App\Observers;

use App\Models\Tag;
use App\Models\Topic;
use App\Models\UserCount;

class TopicObserver
{
    /**
     * Handle the topic "created" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function created(Topic $topic)
    {
        $topic->UserCount->IncrementTopic();
        if ($tag = request()->tag) {
            $uid = auth()->id();
            $query = Tag::whereUserId($uid)->whereIn('name',$tag);
            $tags = $query->get();
            $need = collect($tag)->diff($tags->pluck('name'));
            $need->each(function ($item)use($uid) {
                Tag::create([
                    'name' => $item,
                    'user_id' => $uid
                ]);
            });
            $ids = $query->pluck('id');
            $topic->tag = $ids;
            $topic->Tag()->sync($ids);
        }
    }


    /**
     * Handle the topic "updated" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function updated(Topic $topic)
    {
        //
    }

    /**
     * Handle the topic "deleted" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function deleted(Topic $topic)
    {
        $topic->UserCount->DecrementTopic();
    }

    /**
     * Handle the topic "restored" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function restored(Topic $topic)
    {
        //
    }

    /**
     * Handle the topic "force deleted" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function forceDeleted(Topic $topic)
    {
        //
    }

    public function creating(Topic $topic)
    {

    }
}
