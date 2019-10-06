<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 如果没有登陆，重定向到登陆页
        if( !Auth::guard('admin')->check() ){
            return redirect('admin/public/login');
        }
        return $next($request);
    }
}
