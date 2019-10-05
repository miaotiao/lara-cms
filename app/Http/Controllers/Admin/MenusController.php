<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    /**
     * 展示所有的菜单；有权限查看的菜单；
     * @Author   MT
     * @Datetime 2019-09-26T17:03:40+0800
     * @return   [type]                   [description]
     */
    public function showMenus()
    {
        $menus = cache::();//缓存中获取menus；
        if( empty($menus) ){
            $map = ;
        }
    }
}
