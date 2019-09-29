<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('configs')->truncate();

        \DB::table('configs')->insert([
            [
                'id'        =>  1,
                'name'      =>  'website.title',
                'title'     =>  '网站标题',
                'remark'    =>  '',
                'type'      =>  '1',
                'group'     =>  '1',
                'extra'     =>  '',
                'value'     =>  '赵钱',
                'sort'      =>  1,
                'status'    =>  1,
            ],
            [
                'id'        =>  2,
                'name'      =>  'website.keyword',
                'title'     =>  '关键字',
                'remark'    =>  '',
                'type'      =>  '1',
                'group'     =>  '1',
                'extra'     =>  '',
                'value'     =>  '赵钱',
                'sort'      =>  1,
                'status'    =>  1,
            ],
            [
                'id'        =>  3,
                'name'      =>  'website.icp',
                'title'     =>  '备案号',
                'remark'    =>  '',
                'type'      =>  '1',
                'group'     =>  '1',
                'extra'     =>  '',
                'value'     =>  '',
                'sort'      =>  1,
                'status'    =>  1,
            ],
            [
                'id'        =>  4,
                'name'      =>  'website.status',
                'title'     =>  '网站状态',
                'remark'    =>  '可以开启/关闭',
                'type'      =>  '4',
                'group'     =>  '1',
                'extra'     =>  '0:关闭;1:开启;',
                'value'     =>  '1',
                'sort'      =>  1,
                'status'    =>  1,
            ],
            [
                'id'        =>  5,
                'name'      =>  'base.type',
                'title'     =>  '配置类型',
                'remark'    =>  '会根据类型进行解析',
                'type'      =>  '3',
                'group'     =>  '4',
                'extra'     =>  '',
                'value'     =>  '0:数字;1:字符串;2:文本;3:数组;4:枚举',
                'sort'      =>  1,
                'status'    =>  1,
            ],
            [
                'id'        =>  4,
                'name'      =>  'base.group',
                'title'     =>  '配置分组',
                'remark'    =>  '',
                'type'      =>  '3',
                'group'     =>  '4',
                'extra'     =>  '',
                'value'     =>  '1:基础;2:内容;3:用户;4:系统;',
                'sort'      =>  1,
                'status'    =>  1,
            ],
        ]);
    }
}
