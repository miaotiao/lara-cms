<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->truncate();

        \DB::table('admins')->insert([
            [
                'id'                =>  1,
                'name'              =>  'root',
                'email'             =>  '123@qq.com',
                'email_verified_at' =>  now(),
                'password'          =>  bcrypt('rootroot'),
                'remember_token'    =>  Str::random(10),
                'created_at'         =>  now(),
                'updated_at'         =>  now(),
            ],
        ]);
    }
}
