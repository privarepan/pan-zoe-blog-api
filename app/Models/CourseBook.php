<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CourseBook
 *
 * @property int $id
 * @property string $title 教程名称
 * @property string|null $excerpt 教程简介
 * @property float $prices 价格
 * @property int|null $user_id 用户id
 * @property int|null $image_id 封面图片id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resource[] $Resource
 * @property-read int|null $resource_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook wherePrices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseBook whereUserId($value)
 * @mixin \Eloquent
 */
class CourseBook extends Model
{
    public function Resource()
    {
        return $this->morphMany(Resource::class,'Resource','origin_type','origin_id');
    }

}
