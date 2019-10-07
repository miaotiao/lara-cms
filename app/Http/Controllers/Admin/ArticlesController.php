<?php

namespace App\Http\Controllers\Admin;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('article.index');
    }

    /**
     * 文章列表
     * @Author   MT
     * @Datetime 2019-10-07T11:13:11+0800
     * @return   [type]                   [description]
     */
    public function list()
    {

        return view('article.list',$aritcles);
    }
}
