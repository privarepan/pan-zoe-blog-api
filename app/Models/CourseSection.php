<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CourseSection
 *
 * @property int $id
 * @property string $title 章节名称
 * @property int $course_book_id 教程书籍id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseSection whereCourseBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseSection whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseSection whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CourseSection extends Model
{
    //
}
