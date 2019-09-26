<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;

class ConfigsController extends Controller
{
    public function index()
    {

    }

    /**
     * 显示所有的配置信息
     * @Author   MT
     * @Datetime 2019-09-26T09:33:49+0800
     * @return   [type]                   [description]
     */
    public function list()
    {
        //$list = Config::where()->select();
        return view('admin.config.list');
    }

    /**
     * 创建新的配置项
     * @Author   MT
     * @Datetime 2019-09-25T17:29:21+0800
     * @return   [type]                   [description]
     */
    public function create()
    {

    }

    /**
     * 修改单个配置项
     * @Author   MT
     * @Datetime 2019-09-25T17:30:53+0800
     * @return   [type]                   [description]
     */
    public function edit()
    {

    }

    /**
     * 更新配置项
     * @Author   MT
     * @Datetime 2019-09-25T17:31:05+0800
     * @return   [type]                   [description]
     */
    public function update()
    {

    }

    public function forceDelete()
    {

    }

}
