<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string $title 标题
 * @property string $body 内容
 * @property int $reply_count 回复数
 * @property int $view_count 浏览数
 * @property string|null $slug SEO
 * @property int $policy 0:免费，1:收费，2:限免
 * @property int $course_section_id 教程章节id
 * @property int $user_id 用户id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereCourseSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course wherePolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereReplyCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereViewCount($value)
 * @mixin \Eloquent
 */
class Course extends Model
{
    //
}
