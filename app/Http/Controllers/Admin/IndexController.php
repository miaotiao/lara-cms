<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    /**
     * 后台首页
     * @Author   MT
     * @Datetime 2019-09-25T17:19:48+0800
     * @return   [type]                   [description]
     */
    public function index()
    {
        $webInfo = [];
        $version = [
            'system'    =>  PHP_OS,
            'webserver' =>  $_SERVER['SERVER_SOFTWARE'] ?? '',
            'php'       =>  PHP_VERSION,
            'mysql'     =>  DB::select('SHOW VARIABLES LIKE "version"')[0]->Value,
        ];
        $assign = compact('version','webInfo');
        return view('admin.index.index',$assign);
    }
}
