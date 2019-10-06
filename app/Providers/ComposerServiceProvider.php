<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use App\Models\Config;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 加载数据库配置
        $config = config::where('status',1)->pluck('value','name');
        if( $config->isEmpty() ){
            return true;
        }
        config($config->toArray());
        // 注入菜单
        view()->composer('layouts/think',function($view) {
            $menu = new Menu;
            $menus = $menu->getMenuTree();
            $assign = compact('menus');
            $view->with($assign);
        });
    }
}
