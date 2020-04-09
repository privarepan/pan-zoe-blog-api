<?php

namespace App\Models;

use App\Traits\ViewCount;
use Illuminate\Database\Eloquent\Model;
use Parsedown;

/**
 * App\Models\Topic
 *
 * @property int $id
 * @property int $category_id 分类id
 * @property int $user_id 作者ID
 * @property string $title 标题
 * @property string|null $excerpt 文章摘要
 * @property string|null $slug SEO友好的 URI
 * @property string $body 内容
 * @property int $w_type 文章类型： 0:无图，1:单图，2:大图
 * @property int $image_id 封面图ID
 * @property int $view_count 浏览量
 * @property int $reply_count 回复数
 * @property int $vote_count 喜欢总数-赞
 * @property int $collect_count 收藏数
 * @property int $order 可用来做排序使用
 * @property int $is_top 是否置顶 1是 0否
 * @property int $is_reply 评论: 0 开启且无需审核，1:开启需审核,2:关闭
 * @property int $is_secret 私密: 0:全部可见，1:仅自己可见,2:仅关注我的人可见
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $Category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $Comment
 * @property-read int|null $comment_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $Tag
 * @property-read int|null $tag_count
 * @property-read \App\Models\User $User
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Zan[] $Zan
 * @property-read int|null $zan_count
 * @property-read \App\Models\Zan $ZanWithUser
 * @property-read mixed $created_at_label
 * @property-read mixed $updated_at_label
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereCollectCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereIsReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereIsSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereIsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereReplyCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereViewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereVoteCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Topic whereWType($value)
 * @mixin \Eloquent
 */
class Topic extends Model
{
    use ViewCount;

    protected $fillable = [
        'title','body','user_id','category_id','zan_count','collect_count','reply_count','view_count'
    ];

    protected $appends = [
        'created_at_label', 'updated_at_label','is_zan','is_collect'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class)->select('id','name','description');
    }

    public function Tag()
    {
        return $this->belongsToMany(Tag::class,'topic_tags');
    }

    public function getCreatedAtLabelAttribute()
    {
        if ($created_at = $this->created_at) {
            return $created_at->diffForHumans();
        }
        return '';
    }

    public function getUpdatedAtLabelAttribute()
    {
        if ($updated_at = $this->updated_at) {
            return $updated_at->diffForHumans();
        }
        return '';
    }

    public function Comment()
    {
        return $this->morphMany(Comment::class,'Comment','comment_type','comment_id');
    }

    public function Reply()
    {
        return $this->hasMany(Replies::class)->where('pid',0);
    }

    public function User()
    {
        return $this->belongsTo(User::class)->select('id','name','avatar','created_at','updated_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function Zan()
    {
        return $this->morphMany(Zan::class, 'Zan', 'zan_type', 'zan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne | Zan
     */
    public function ZanWithUser()
    {
        return $this->morphOne(Zan::class, 'Zan', 'zan_type', 'zan_id')->where('user_id', auth()->id());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo | UserCount
     */
    public function UserCount()
    {
        return $this->belongsTo(UserCount::class, 'user_id', 'user_id');
    }

    public function CollectWithUser()
    {
        return $this->belongsTo(Collect::class,'id','topic_id')->where('user_id',auth()->id());
    }

    public function getIsZanAttribute()
    {
        return $this->ZanWithUser ? 1 : 0;
    }

    public function getIsCollectAttribute()
    {
        return $this->CollectWithUser ? 1 : 0;
    }
}
