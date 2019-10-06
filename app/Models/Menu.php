<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class Menu extends Model
{

    /**
     * 获取缓存的菜单，没有就重新获取进行缓存；
     * @Author   MT
     * @Datetime 2019-10-06T17:28:10+0800
     * @return   [type]                   [description]
     */
    public function getMenuTree()
    {
        return Cache::remember('system.menus',36000,function(){
            return $this->all();
        });
    }


}
