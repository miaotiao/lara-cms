<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    // 登陆后重定向
    protected $redirectTo = '/admin/index/index';

    /**
     * 看守器
     * @author miaotiao
     * @datetime 2019-09-28T15:11:10+0800
     * @return   [type]                   [description]
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
