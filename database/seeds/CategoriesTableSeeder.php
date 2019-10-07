<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->truncate();

        \DB::table('categories')->insert([
            [
                'id'    =>  1,
                'name'  =>  'news',
                'title' =>  '新闻',
                'pid'   =>  0,
            ],
            [
                'id'    =>  2,
                'name'  =>  'blog',
                'title' =>  '博客',
                'pid'   =>  0,
            ],
            [
                'id'    =>  3,
                'name'  =>  'national_news ',
                'title' =>  '国内新闻',
                'pid'   =>  1,
            ],
        ]);
    }
}
