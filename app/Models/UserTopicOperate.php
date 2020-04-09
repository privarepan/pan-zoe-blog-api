<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserTopicOperate
 *
 * @property int $id
 * @property int $o_type 类别 0:点赞 1:收藏
 * @property int $topic_id 文章id
 * @property int $user_id 用户id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserTopicOperate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserTopicOperate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserTopicOperate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserTopicOperate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserTopicOperate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserTopicOperate whereOType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserTopicOperate whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserTopicOperate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserTopicOperate whereUserId($value)
 * @mixin \Eloquent
 */
class UserTopicOperate extends Model
{
    protected $table = 'user_topic_operate';
}
