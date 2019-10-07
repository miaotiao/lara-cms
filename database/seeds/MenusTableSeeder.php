<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->truncate();

        \DB::table('menus')->insert([
            [
                'id'                =>  1,
                'title'             =>  '首页',
                'pid'               =>  0,
                'sort'              =>  0,
                'url'               =>  'admin/index/index',
                'hide'              =>  0,
                'remark'            =>  '',
                'group'             =>  '',
                'is_dev'            =>  0,
                'status'            =>  1,
                'created_at'         =>  now(),
                'updated_at'         =>  now(),
            ],
            [
                'id'                =>  2,
                'title'             =>  '内容',
                'pid'               =>  0,
                'sort'              =>  0,
                'url'               =>  'admin/article/list',
                'hide'              =>  0,
                'remark'            =>  '',
                'group'             =>  '',
                'is_dev'            =>  0,
                'status'            =>  1,
                'created_at'         =>  now(),
                'updated_at'         =>  now(),
            ],
            [
                'id'                =>  3,
                'title'             =>  '用户',
                'pid'               =>  0,
                'sort'              =>  0,
                'url'               =>  'admin/user/index',
                'hide'              =>  0,
                'remark'            =>  '',
                'group'             =>  '',
                'is_dev'            =>  0,
                'status'            =>  1,
                'created_at'         =>  now(),
                'updated_at'         =>  now(),
            ],
            [
                'id'                =>  4,
                'title'             =>  '系统',
                'pid'               =>  0,
                'sort'              =>  0,
                'url'               =>  'admin/system/index',
                'hide'              =>  0,
                'remark'            =>  '',
                'group'             =>  '',
                'is_dev'            =>  0,
                'status'            =>  1,
                'created_at'         =>  now(),
                'updated_at'         =>  now(),
            ],
            [
                'id'                =>  5,
                'title'             =>  '扩展',
                'pid'               =>  0,
                'sort'              =>  0,
                'url'               =>  'admin/addons/index',
                'hide'              =>  0,
                'remark'            =>  '',
                'group'             =>  '',
                'is_dev'            =>  0,
                'status'            =>  1,
                'created_at'         =>  now(),
                'updated_at'         =>  now(),
            ],
            [
                'id'                =>  6,
                'title'             =>  '其他',
                'pid'               =>  0,
                'sort'              =>  0,
                'url'               =>  'admin/other/index',
                'hide'              =>  0,
                'remark'            =>  '',
                'group'             =>  '',
                'is_dev'            =>  0,
                'status'            =>  1,
                'created_at'         =>  now(),
                'updated_at'         =>  now(),
            ],
        ]);
    }
}
