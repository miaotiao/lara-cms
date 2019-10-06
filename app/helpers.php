<?php

if (!function_exists('is_json')) {
    /**
     * 判断字符串是否是json
     * @Author   MT
     * @Datetime 2019-10-06T20:55:49+0800
     * @param    [type]                   $json [description]
     * @return   boolean                        [description]
     */
    function is_json($json)
    {
        json_decode($json);
        return json_last_error() == JSON_ERROR_NONE;
    }
}
