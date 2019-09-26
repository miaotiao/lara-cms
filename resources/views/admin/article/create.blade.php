@extends('layouts.think')

<!-- 子导航 -->
@section('sidebar')
    @include('admin.article.sidemenu')
@endsection

@section('body')
    <script src="__STATIC__/uploadify/jquery.uploadify.min.js"></script>
    <div class="main-title cf">
        <h2>
            新增{$info.model_id|get_document_model='title'} [
            <volist name="rightNav" id="nav">
            <a href="{:U('article/index','cate_id='.$nav['id'])}">{$nav.title}</a>
            <if condition="count($rightNav) gt $i"><i class="ca"></i></if>
            </volist>
            <present name="article">：<a href="{:U('article/index','cate_id='.$info['category_id'].'&pid='.$article['id'])}">{$article.title}</a></present>
            ]
        </h2>
    </div>
    <!-- 标签页导航 -->
<div class="tab-wrap">
    <ul class="tab-nav nav">
        <volist name=":parse_config_attr($model['field_group'])" id="group">
            <li data-tab="tab{$key}" <eq name="key" value="1">class="current"</eq>><a href="javascript:void(0);">{$group}</a></li>
        </volist>
    </ul>
    <div class="tab-content">
    <!-- 表单 -->
    <form id="form" action="{:U('update')}" method="post" class="form-horizontal">
        <!-- 基础文档模型 -->
        <volist name=":parse_config_attr($model['field_group'])" id="group">
        <div id="tab{$key}" class="tab-pane <eq name="key" value="1">in</eq> tab{$key}">
            <volist name="fields[$key]" id="field">
                <if condition="$field['is_show'] == 1 || $field['is_show'] == 2">
                <div class="form-item cf">
                    <label class="item-label">{$field['title']}<span class="check-tips"><notempty name="field['remark']">（{$field['remark']}）</notempty></span></label>
                    <div class="controls">
                        <switch name="field.type">
                            <case value="num">
                                <input type="text" class="text input-mid" name="{$field.name}" value="{$field.value}">
                            </case>
                            <case value="string">
                                <input type="text" class="text input-large" name="{$field.name}" value="{$field.value}">
                            </case>
                            <case value="textarea">
                                <label class="textarea input-large">
                                <textarea name="{$field.name}">{$field.value}</textarea>
                                </label>
                            </case>
                            <case value="date">
                                <input type="text" name="{$field.name}" class="text date" value="" placeholder="请选择日期" />
                            </case>
                            <case value="datetime">
                                <input type="text" name="{$field.name}" class="text time" value="" placeholder="请选择时间" />
                            </case>
                            <case value="bool">
                                <select name="{$field.name}">
                                    <volist name=":parse_field_attr($field['extra'])" id="vo">
                                        <option value="{$key}" <eq name="field.value" value="$key">selected</eq>>{$vo}</option>
                                    </volist>
                                </select>
                            </case>
                            <case value="select">
                                <select name="{$field.name}">
                                    <volist name=":parse_field_attr($field['extra'])" id="vo">
                                        <option value="{$key}" <eq name="field.value" value="$key">selected</eq>>{$vo}</option>
                                    </volist>
                                </select>
                            </case>
                            <case value="radio">
                                <volist name=":parse_field_attr($field['extra'])" id="vo">
                                    <label class="radio">
                                    <input type="radio" value="{$key}" <eq name="field.value" value="$key">checked</eq> name="{$field.name}">{$vo}
                                    </label>
                                </volist>
                            </case>
                            <case value="checkbox">
                                <volist name=":parse_field_attr($field['extra'])" id="vo">
                                    <label class="checkbox">
                                    <input type="checkbox" value="{$key}" name="{$field.name}[]" <eq name="field.value" value="$key">checked</eq>>{$vo}
                                    </label>
                                </volist>
                            </case>
                            <case value="editor">
                                <label class="textarea">
                                <textarea name="{$field.name}">{$field.value}</textarea>
                                {:hook('adminArticleEdit', array('name'=>$field['name'],'value'=>$field['value']))}
                                </label>
                            </case>
                            <case value="picture">
                                <div class="controls">
                                    <input type="file" id="upload_picture_{$field.name}">
                                    <input type="hidden" name="{$field.name}" id="cover_id_{$field.name}"/>
                                    <div class="upload-img-box">
                                    <notempty name="data[$field['name']]">
                                        <div class="upload-pre-item"><img src="{$data[$field['name']]|get_cover='path'}"/></div>
                                    </notempty>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                //上传图片
                                /* 初始化上传插件 */
                                $("#upload_picture_{$field.name}").uploadify({
                                    "height"          : 30,
                                    "swf"             : "__STATIC__/uploadify/uploadify.swf",
                                    "fileObjName"     : "download",
                                    "buttonText"      : "上传图片",
                                    "uploader"        : "{:U('File/uploadPicture',array('session_id'=>session_id()))}",
                                    "width"           : 120,
                                    'removeTimeout'   : 1,
                                    'fileTypeExts'    : '*.jpg; *.png; *.gif;',
                                    "onUploadSuccess" : uploadPicture{$field.name},
                                    'onFallback' : function() {
                                        alert('未检测到兼容版本的Flash.');
                                    }
                                });
                                function uploadPicture{$field.name}(file, data){
                                    var data = $.parseJSON(data);
                                    var src = '';
                                    if(data.status){
                                        $("#cover_id_{$field.name}").val(data.id);
                                        src = data.url || '__ROOT__' + data.path
                                        $("#cover_id_{$field.name}").parent().find('.upload-img-box').html(
                                            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                        );
                                    } else {
                                        updateAlert(data.info);
                                        setTimeout(function(){
                                            $('#top-alert').find('button').click();
                                            $(that).removeClass('disabled').prop('disabled',false);
                                        },1500);
                                    }
                                }
                                </script>
                            </case>
                            <case value="file">
                                <div class="controls">
                                    <input type="file" id="upload_file_{$field.name}">
                                    <input type="hidden" name="{$field.name}" value="{$data[$field['name']]}"/>
                                    <div class="upload-img-box">
                                        <present name="data[$field['name']]">
                                            <div class="upload-pre-file"><span class="upload_icon_all"></span>{$data[$field['name']]}</div>
                                        </present>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                //上传图片
                                /* 初始化上传插件 */
                                $("#upload_file_{$field.name}").uploadify({
                                    "height"          : 30,
                                    "swf"             : "__STATIC__/uploadify/uploadify.swf",
                                    "fileObjName"     : "download",
                                    "buttonText"      : "上传附件",
                                    "uploader"        : "{:U('File/upload',array('session_id'=>session_id()))}",
                                    "width"           : 120,
                                    'removeTimeout'   : 1,
                                    "onUploadSuccess" : uploadFile{$field.name},
                                    'onFallback' : function() {
                                        alert('未检测到兼容版本的Flash.');
                                    }
                                });
                                function uploadFile{$field.name}(file, data){
                                    var data = $.parseJSON(data);
                                    if(data.status){
                                        var name = "{$field.name}";
                                        $("input[name="+name+"]").val(data.data);
                                        $("input[name="+name+"]").parent().find('.upload-img-box').html(
                                            "<div class=\"upload-pre-file\"><span class=\"upload_icon_all\"></span>" + data.info + "</div>"
                                        );
                                    } else {
                                        updateAlert(data.info);
                                        setTimeout(function(){
                                            $('#top-alert').find('button').click();
                                            $(that).removeClass('disabled').prop('disabled',false);
                                        },1500);
                                    }
                                }
                                </script>
                            </case>
                            <default/>
                            <input type="text" class="text input-large" name="{$field.name}" value="{$field.value}">
                        </switch>
                    </div>
                </div>
                </if>
            </volist>
        </div>
        </volist>

        <div class="form-item cf">
            <button class="btn submit-btn ajax-post hidden" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            <a class="btn btn-return" href="{:U('article/index?cate_id='.$cate_id)}">返 回</a>
            <if condition="C('OPEN_DRAFTBOX') and (ACTION_NAME eq 'add' or $info['status'] eq 3)">
            <button class="btn save-btn" url="{:U('article/autoSave')}" target-form="form-horizontal" id="autoSave">
                存草稿
            </button>
            </if>
            <input type="hidden" name="id" value="{$info.id|default=''}"/>
            <input type="hidden" name="pid" value="{$info.pid|default=''}"/>
            <input type="hidden" name="model_id" value="{$info.model_id|default=''}"/>
            <input type="hidden" name="group_id" value="{$info.group_id|default=''}"/>
            <input type="hidden" name="category_id" value="{$info.category_id|default=''}">
        </div>
    </form>
    </div>
</div>
@endsection

@section('script')
<link href="__STATIC__/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
<php>if(C('COLOR_STYLE')=='blue_color') echo '<link href="__STATIC__/datetimepicker/css/datetimepicker_blue.css" rel="stylesheet" type="text/css">';</php>
<link href="__STATIC__/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script src="__STATIC__/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="__STATIC__/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script>

$('#submit').click(function(){
    $('#form').submit();
});

$(function(){
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });
    showTab();

    <if condition="C('OPEN_DRAFTBOX') and (ACTION_NAME eq 'add' or $info['status'] eq 3)">
    //保存草稿
    var interval;
    $('#autoSave').click(function(){
        var target_form = $(this).attr('target-form');
        var target = $(this).attr('url')
        var form = $('.'+target_form);
        var query = form.serialize();
        var that = this;

        $(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
        $.post(target,query).success(function(data){
            if (data.status==1) {
                updateAlert(data.info ,'alert-success');
                $('input[name=id]').val(data.data.id);
            }else{
                updateAlert(data.info);
            }
            setTimeout(function(){
                $('#top-alert').find('button').click();
                $(that).removeClass('disabled').prop('disabled',false);
            },1500);
        })

        //重新开始定时器
        clearInterval(interval);
        autoSaveDraft();
        return false;
    });

    //Ctrl+S保存草稿
    $('body').keydown(function(e){
        if(e.ctrlKey && e.which == 83){
            $('#autoSave').click();
            return false;
        }
    });

    //每隔一段时间保存草稿
    function autoSaveDraft(){
        interval = setInterval(function(){
            //只有基础信息填写了，才会触发
            var title = $('input[name=title]').val();
            var name = $('input[name=name]').val();
            var des = $('textarea[name=description]').val();
            if(title != '' || name != '' || des != ''){
                $('#autoSave').click();
            }
        }, 1000*parseInt({:C('DRAFT_AOTOSAVE_INTERVAL')}));
    }
    autoSaveDraft();

    </if>

});
</script>
@endsection
