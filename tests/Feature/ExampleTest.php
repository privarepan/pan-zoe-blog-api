<?php

namespace Tests\Feature;

use App\Models\Topic;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;
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

        Mail::raw("这是测试的内容222", function ($message){
            // * 如果你已经设置过, mail.php中的from参数项,可以不用使用这个方法,直接发送
            // $message->from("1182468610@qq.com", "laravel学习测试");
            $message->subject("测试的邮件主题");
            // 指定发送到哪个邮箱账号
            $message->to("373500914@qq.com");
        });

        // 判断邮件是否发送失败
        dd(count(Mail::failures()));
    }

    public function test444()
    {
        $str = 'abcdefgabcdefg';
        $d = test($str);
        $t = array_values($d);
        $key = max(...$t);
        $max_key = array_search($key, $d);
        dd($max_key);
    }
}

function getString($s) {
    $len = strlen($s);
    $res = array();
    $r = array();
    for ($i = 0; $i < $len; $i++) {
        if (in_array($s[$i], $r)) {
            $r = array_slice($r, array_search($s[$i], $r) + 1);
        }
        $r[] = $s[$i];
        if (count($r) > count($res)) {
            $res = $r;
        }
    }
    return implode('', $res);
}

function test($str)
{
    $i = 0;
    $arr = [];
    while (!empty($str{$i})) {
        $start = strpos($str,$str{$i});
        while (1) {
            $index = strpos($str,$str{$i},$start+1);
            if ($index === false) {
                $need = substr($str,$start);
                $arr[$need] = strlen($need);
                break;
            }
            $need = substr($str,$start,$index-$start);
            $arr[$need] = strlen($need);
            $start = $index;
        }
        $i++;
    }
    return $arr;
}
