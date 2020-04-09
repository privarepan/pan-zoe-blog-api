<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserCount
 *
 * @property int $id
 * @property int $user_id
 * @property int $topic_count
 * @property int $collect_count
 * @property int $click_zan_count
 * @property int $comment_count
 * @property int $star_count
 * @property int $fans_count
 * @property int $zan_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereClickZanCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereCollectCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereCommentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereFansCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereStarCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereTopicCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCount whereZanCount($value)
 * @mixin \Eloquent
 */
class UserCount extends Model
{
    protected $guarded = [];

    public function IncrementTopic($num = 1)
    {
        return $this->increment('topic_count',$num);
    }

    public function DecrementTopic($num = 1)
    {
        return $this->decrement('topic_count',$num);
    }

    public function IncrementCollect($num = 1)
    {
        return $this->increment('collect_count',$num);
    }

    public function DecrementCollect($num = 1)
    {
        return $this->decrement('collect_count',$num);
    }

    public function IncrementStar($num = 1)
    {
        return $this->increment('star_count',$num);
    }

    public function DecrementStar($num = 1)
    {
        return $this->decrement('star_count',$num);
    }

    public function IncrementFans($num = 1)
    {
        return $this->increment('fans_count',$num);
    }

    public function DecrementFans($num = 1)
    {
        return $this->decrement('fans_count',$num);
    }

    public function IncrementReply($num = 1)
    {
        return $this->increment('reply_count',$num);
    }

    public function DecrementReply($num = 1)
    {
        return $this->decrement('reply_count',$num);
    }

    public function IncrementZan($num = 1)
    {
        return $this->increment('zan_count',$num);
    }

    public function DecrementZan($num = 1)
    {
        return $this->decrement('zan_count',$num);
    }
}
