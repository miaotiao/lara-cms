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
        \DB::table('Menus')->truncate();

        \DB::table('Menus')->insert([
            [
                'id'                =>  1,
                'title'             =>  '首页',
                'pid'               =>  0,
                'sort'              =>  0,
                'url'               =>  'admin/Index/index',
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
                'url'               =>  'admin/Article/index',
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
                'url'               =>  'admin/User/index',
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
                'url'               =>  'admin/System/index',
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
                'url'               =>  'admin/Addons/index',
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