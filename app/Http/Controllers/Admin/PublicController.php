<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    /**
     * 登陆
     * @Author   MT
     * @Datetime 2019-09-26T17:55:54+0800
     * @return   [type]                   [description]
     */
    public function login()
    {
        return view('admin.public.login');
    }

    /**
     * 退出登陆
     * @Author   MT
     * @Datetime 2019-09-26T17:55:41+0800
     * @return   [type]                   [description]
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/public/login');
    }

}
