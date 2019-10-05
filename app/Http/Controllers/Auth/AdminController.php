<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    // 登陆后重定向
    protected $redirectTo = '/admin/index/index';

    public function __construct()
    {
        $this->middleware('admin.login')->except('logout');// 排除登出
    }

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
