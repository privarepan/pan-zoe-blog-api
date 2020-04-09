<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;

class CaptchaController extends Controller
{
    public function index()
    {
        $captcha = Captcha::create('flat',true);
        return $this->success($captcha);
    }

}
