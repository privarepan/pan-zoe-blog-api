<?php

namespace Tests\Unit;

use App\Models\Collect;
use App\Models\Comment;
use App\Models\Fans;
use App\Models\Replies;
use App\Models\Resource;
use App\Models\Star;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\TopicTag;
use App\Models\User;
use App\Models\UserCount;
use App\Models\Zan;
use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testDeleteData()
    {
        \DB::transaction(function () {
            User::truncate();
            Topic::truncate();
            Zan::truncate();
            Resource::truncate();
            Star::truncate();
            Tag::truncate();
            TopicTag::truncate();
            UserCount::truncate();
            Collect::truncate();
            Comment::truncate();
            Fans::truncate();
            Replies::truncate();
        });


    }

    public function test4()
    {
        dd(app(Dispatcher::class));
        User::find(1)->sendEmailVerificationNotification();
    }
}
