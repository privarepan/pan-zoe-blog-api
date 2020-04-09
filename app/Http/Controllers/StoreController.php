<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('image');
        $str = date('Y-m');
        $path = $file->store('images/'.$str);
        return $this->success($path);
    }
}
