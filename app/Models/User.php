<?php

namespace App\Models;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\User
 *
 * @property int $id 主键
 * @property string $name 用户名
 * @property string $email 邮箱
 * @property int $phone 手机号
 * @property string|null $github_name GitHub Name
 * @property string|null $real_name 真实姓名
 * @property string|null $introduction 个人简介
 * @property string|null $city 城市
 * @property string|null $hobby 爱好
 * @property string|null $signature 署名
 * @property int $sex 性别:0 保密，1 男，2 女
 * @property int $score 个人积分
 * @property string|null $company 公司或组织名称
 * @property string|null $job_title 职位头衔
 * @property string|null $per_web 个人网站
 * @property string|null $github_site github地址
 * @property string|null $weibo_site 微博链接
 * @property string|null $wc_qrcode 微信账号二维码
 * @property string|null $pay_qrcode 支付二维码
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserCount $Statistics
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $Tag
 * @property-read int|null $tag_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Topic[] $Topic
 * @property-read int|null $topic_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Zan[] $Zan
 * @property-read int|null $zan_count
 * @property-read mixed $created_at_label
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereGithubName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereGithubSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereHobby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIntroduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePayQrcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePerWeb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereWcQrcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereWeiboSite($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $appends = [
        'created_at_label'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return Storage::url('avatar/'.$value);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function Topic()
    {
        return $this->hasMany(Topic::class);
    }


    public function Statistics()
    {
        return $this->hasOne(UserCount::class);
    }

    public function getCreatedAtLabelAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function Tag()
    {
        return $this->hasMany(Tag::class);
    }

    public function Zan()
    {
        return $this->hasMany(Zan::class);
    }

    public function Collect()
    {
        return $this->hasMany(Collect::class);
    }

    public function Star()
    {
        return $this->hasMany(Star::class);
    }

    public function Fans()
    {
        return $this->hasMany(Star::class, 'id', 'star_id');
    }

}
