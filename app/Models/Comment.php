<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property string $comment_type
 * @property int $comment_id
 * @property string $data
 * @property int $pid
 * @property int $statue
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $Origin
 * @property-read \App\Models\User $User
 * @property-read mixed $created_at_label
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereStatue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUserId($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    protected $appends = [
        'created_at_label'
    ];
    protected $fillable = [
        'user_id','comment_type','comment_id','data','pid','status','reply_count'
    ];

    public function Origin()
    {
        return $this->morphTo('Origin','comment_type','comment_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtLabelAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
