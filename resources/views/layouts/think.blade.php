<!doctype html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <title>@yield('meta_title')|乐之管理平台</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="/assets/admin/css/base.css" media="all">
    <link rel="stylesheet" href="/assets/admin/css/common.css" media="all">
    <link rel="stylesheet" href="/assets/admin/css/module.css">
    <link rel="stylesheet" href="/assets/admin/css/style.css" media="all">
    <link rel="stylesheet" href="/assets/admin/css/{$Think.config.COLOR_STYLE}.css" media="all">
     <!--[if lt IE 9]>
    <script src="/assets/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script src="/assets/static/jquery-2.0.3.min.js"></script>
    <script src="/assets/static/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    @yield('css')
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
           {{-- @foreach ( __MENU__.main as $menu)
                <li class="{$menu.class|default=''}"><a href="{$menu.url|U}">{$menu.title}</a></li>
            @endforeach
            --}}
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="{:session('user_auth.username')}">{:session('user_auth.username')}</em></li>
                <li><a href="{:U('User/updatePassword')}">修改密码</a></li>
                <li><a href="{:U('User/updateNickname')}">修改昵称</a></li>
                <li><a href="{:U('Public/logout')}">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        @section('sidebar')
            <div id="subnav" class="subnav">
                <notempty name="_extra_menu">
                    {{-- 动态扩展菜单 --}}
                    {:extra_menu($_extra_menu,$__MENU__)}
                </notempty>
                <volist name="__MENU__.child" id="sub_menu">
                    <!-- 子导航 -->
                    <notempty name="sub_menu">
                        <notempty name="key"><h3><i class="icon icon-unfold"></i>{$key}</h3></notempty>
                        <ul class="side-sub-menu">
                            <volist name="sub_menu" id="menu">
                                <li>
                                    <a class="item" href="{$menu.url|U}">{$menu.title}</a>
                                </li>
                            </volist>
                        </ul>
                    </notempty>
                    <!-- /子导航 -->
                </volist>
            </div>
        @show
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            @section('nav')
            <block name="nav">
            <!-- nav -->
            <notempty name="_show_nav">
            <div class="breadcrumb">
                <span>您的位置:</span>
                <assign name="i" value="1" />
                <foreach name="_nav" item="v" key="k">
                    <if condition="$i eq count($_nav)">
                    <span>{$v}</span>
                    <else />
                    <span><a href="{$k}">{$v}</a>&gt;</span>
                    </if>
                    <assign name="i" value="$i+1" />
                </foreach>
            </div>
            </notempty>
            <!-- nav -->
            @show

            @yield('body')

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.lezhinet.com" target="_blank">乐之</a>管理平台</div>
                <div class="fr">V{201909261030}</div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script>
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "__ROOT__", //当前网站地址
            "APP"    : "__APP__", //当前项目地址
            "PUBLIC" : "__PUBLIC__", //项目公共目录地址
            "DEEP"   : "{:C('URL_PATHINFO_DEPR')}", //PATHINFO分割符
            "MODEL"  : ["{:C('URL_MODEL')}", "{:C('URL_CASE_INSENSITIVE')}", "{:C('URL_HTML_SUFFIX')}"],
            "VAR"    : ["{:C('VAR_MODULE')}", "{:C('VAR_CONTROLLER')}", "{:C('VAR_ACTION')}"]
        }
    })();
    </script>
    <script src="/assets/static/think.js"></script>
    <script src="/assets/admin/js/common.js"></script>
    <script>
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

            /* 表单获取焦点变色 */
            $("form").on("focus", "input", function(){
                $(this).addClass('focus');
            }).on("blur","input",function(){
                        $(this).removeClass('focus');
                    });
            $("form").on("focus", "textarea", function(){
                $(this).closest('label').addClass('focus');
            }).on("blur","textarea",function(){
                $(this).closest('label').removeClass('focus');
            });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>

    @yield('script')

</body>
</html>
