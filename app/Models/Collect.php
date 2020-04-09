<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Collect
 *
 * @property int $id
 * @property int $user_id
 * @property int $topic_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereUserId($value)
 * @mixin \Eloquent
 */
class Collect extends Model
{
    protected $fillable = [
        'user_id','topic_id'
    ];

    protected $appends = [
        'created_at_label'
    ];

    public function getCreatedAtLabelAttribute()
    {
        if ($created_at = $this->created_at) {
            return $created_at->diffForHumans();
        }
        return '';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo | UserCount
     */
    public function UserCount()
    {
        return $this->belongsTo(UserCount::class, 'user_id', 'user_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Topic()
    {
        return $this->hasOne(Topic::class,'id','topic_id');
    }
}
