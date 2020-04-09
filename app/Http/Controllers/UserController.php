<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->only('mine','index');
    }

    public function index()
    {
        $user = auth()->user();
        return $this->success($user);
    }

    public function email()
    {
        User::find(1)->sendEmailVerificationNotification();
//        Mail::raw("这是测试的内容", function ($message){
//            // * 如果你已经设置过, mail.php中的from参数项,可以不用使用这个方法,直接发送
//            // $message->from("1182468610@qq.com", "laravel学习测试");
//            $message->subject("测试的邮件主题");
//            // 指定发送到哪个邮箱账号
//            $message->to("373500914@qq.com");
//        });
//
////        // 判断邮件是否发送失败
//        dd(count(Mail::failures()));
    }

    public function show($id)
    {
        $user = User::with('Statistics')
            ->findOrFail($id);
        return $this->success($user);
    }

    public function mine()
    {
        $user = auth()->user()->load('Statistics');
        return $this->success($user);
    }


}
