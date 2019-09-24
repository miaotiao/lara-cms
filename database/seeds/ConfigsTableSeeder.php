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
                'id'    =>  1,
                'name'  =>  '',
                'title' =>  '',
                'remark'    =>  '',
                'type'      =>  '',
                'group'     =>  '',
                'extra'     =>  '',
                'value'     =>  '',
                'sort'      =>  1,
                'status'    =>  1,
            ],
        ]);
    }
}
