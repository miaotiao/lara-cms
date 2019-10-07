<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           AdminsTableSeeder::class,
           ConfigsTableSeeder::class,
           MenusTableSeeder::class,
           CategoriesTableSeeder::class,
        ]);
        // $this->call(AdminsTableSeeder::class);
    }
}
