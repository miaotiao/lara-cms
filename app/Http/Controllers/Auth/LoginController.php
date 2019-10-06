<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 修改 AuthenticatesUsers 的 logout 方法。
     * @Author   MT
     * @Datetime 2019-10-06T09:34:12+0800
     * @return   [type]                   [description]
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        // 清除这个 session 的数据，重新生成一个 session_id，后台登陆也给取消掉了。
        // $request->session()->invalidate();

        return redirect('/');
    }
}
