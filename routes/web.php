<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Auth')->prefix('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::post('login','AdminController@login');
    });
});

// 后台登陆
Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::redirect('/',url('admin/public/login'));
    Route::prefix('public')->group(function(){
        // 登陆页面
        Route::get('login','PublicController@login')->middleware('admin.login');
        // 退出
        Route::get('logout','PublicController@logout');
    });
});
// 登陆后的页面
Route::namespace('Admin')->prefix('admin')->middleware('admin.auth')->group(function(){
    // 首页控制器
    Route::prefix('index')->group(function(){
        Route::get('index','IndexController@index');
    });
    // 管理员控制器
    Route::prefix('user')->group(function(){
        // 管理员列表
        Route::get('index', 'UserController@index');
        // 编辑管理员
        Route::get('edit/{id}', 'UserController@edit');
        Route::post('update/{id}', 'UserController@update');
        // 删除管理员
        Route::get('destroy/{id}', 'UserController@destroy');
        // 恢复删除的管理员
        Route::get('restore/{id}', 'UserController@restore');
        // 彻底删除管理员
        Route::get('forceDelete/{id}', 'UserController@forceDelete');
    });
    // 文章控制器
    Route::prefix('article')->group(function(){
        // 文章列表
        Route::get('list','ArticleController@list');
        // 发布文章
        Route::get('create', 'ArticleController@create');
        Route::post('store', 'ArticleController@store');
        // 编辑文章
        Route::get('edit/{id}', 'ArticleController@edit');
        Route::post('update/{id}', 'ArticleController@update');
        // 上传图片
        Route::post('uploadImage', 'ArticleController@uploadImage');
        // 删除文章
        Route::get('destroy/{id}', 'ArticleController@destroy');
        // 恢复删除的文章
        Route::get('restore/{id}', 'ArticleController@restore');
        // 彻底删除文章
        Route::get('forceDelete/{id}', 'ArticleController@forceDelete');
        // 批量替换功能视图
        Route::get('replaceView', 'ArticleController@replaceView');
        // 批量替换功能
        Route::post('replace', 'ArticleController@replace');
    });

    Route::prefix('config')->group(function(){
        // 配置列表
        Route::get('list','ConfigsController@list');
        // 添加配置
        Route::get('create','ConfigsController@create');
        Route::post('store','ConfigsController@store');
        // 编辑配置
        Route::get('edit/{id}','ConfigsController@edit');
        Route::post('update/{id}','ConfigsController@update');
        // 删除配置
        Route::get('delete/{id}','ConfigsController@delete');
        // 清除配置缓存
        Route::get('clear','ConfigsController@clear');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
