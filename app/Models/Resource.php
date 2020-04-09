<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Resource
 *
 * @property int $id
 * @property string $path
 * @property string $alt
 * @property string $type
 * @property int $origin_id
 * @property string $origin_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereOriginId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereOriginType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Resource extends Model
{
    //
}
