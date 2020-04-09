<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Replies
 *
 * @property int $id
 * @property int $topic_id 文章id
 * @property int $user_id 评论用户id
 * @property int $type 1：文章评论 2:回复评论
 * @property int $pid 父级id
 * @property string $body 内容
 * @property int $verify 审核 0：待审核，1:通过，2:不通过
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Replies whereVerify($value)
 * @mixin \Eloquent
 */
class Replies extends Model
{
    protected $with = [
        'User',
    ];

    protected $appends = [
        'created_at_label'
    ];

    public function getCreatedAtLabelAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    protected $fillable = [
        'topic_id','receive_id','send_id','body','level'
    ];

    public function Topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function subset()
    {
        return $this->hasMany(Replies::class,'pid','id')->with('ReceiveUser');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'send_id','id')->select('id','name','created_at','updated_at');
    }

    public function ReceiveUser()
    {
        return $this->belongsTo(User::class,'receive_id')->select('id','name','created_at');
    }

    public function UserCount()
    {
        return $this->belongsTo(UserCount::class,'send_id','user_id');
    }

}
