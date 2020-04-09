<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Zan
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $zan_type
 * @property int $zan_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $User
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan topic()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan whereZanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Zan whereZanType($value)
 * @mixin \Eloquent
 */
class Zan extends Model
{
    protected $fillable = [
        'user_id','topic_id','zan_type','zan_id'
    ];

    public function scopeTopic(Builder $builder)
    {
        $builder->whereZanType(Topic::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Origin()
    {
        return $this->morphTo('Origin','zan_type','zan_id');
    }
}
