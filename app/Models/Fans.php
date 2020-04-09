<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Fans
 *
 * @property int $id
 * @property int $f_uid 粉丝uid
 * @property int $a_uid 被关注人uid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Fans newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Fans newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Fans query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Fans whereAUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Fans whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Fans whereFUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Fans whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Fans whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Fans extends Model
{
    protected $table = 'fans';
}
