@extends('layouts.think')

@section('meta_title','首页')

@section('sidebar') @endsection

@section('style')
    <style>body{padding: 0}</style>
@endsection

@section('body')
    <!-- 主体 -->
    <div id="indexMain" class="index-main">
       <!-- 插件块 -->
       <div class="container-span">{:hook('AdminIndex')}</div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    /* 插件块关闭操作 */
    $(".title-opt .wm-slide").each(function(){
        $(this).click(function(){
            $(this).closest(".columns-mod").find(".bd").toggle();
            $(this).find("i").toggleClass("mod-up");
        });
    })
    $(function(){
        // $('#main').attr({'id': 'indexMain','class': 'index-main'});
        $('.copyright').html('©2013-2020 test test test 所有');
        $('.sidebar').remove();
    })
</script>
@endsection
