<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('configs')->truncate();

        $time = time();
        \DB::table('configs')->insert([
            [
                'id'                =>  1,
                'name'              =>  'root',
                'email'             =>  '123@qq.com',
                'email_verified_at' =>  $time,
                'password'          =>  bcrypt('secret'),
                'remember_token'    =>  str_random(10),
                'create_at'         =>  $time,
                'update_at'         =>  $time,
            ],
        ]);
    }
}
