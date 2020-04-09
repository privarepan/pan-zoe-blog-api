<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Star
 *
 * @property int $id
 * @property int $user_id
 * @property string $star_type
 * @property int $star_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Star newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Star newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Star query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Star whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Star whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Star whereStarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Star whereStarType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Star whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Star whereUserId($value)
 * @mixin \Eloquent
 */
class Star extends Model
{
    protected $fillable = [
        'user_id','star_id'
    ];

    public function Star()
    {
        return $this->belongsTo(User::class,'star_id')->select('introduction','id','name','avatar','created_at');
    }

    public function User()
    {
        return $this->belongsTo(User::class)->select('introduction','id','name','avatar','created_at');
    }

    public function Stars()
    {
        return $this->belongsTo(UserCount::class,'user_id','user_id');
    }

    public function Fans()
    {
        return $this->belongsTo(UserCount::class, 'star_id', 'user_id');
    }

}
