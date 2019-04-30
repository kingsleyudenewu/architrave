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
             AssetTableSeeder::class,
             RoleTableSeeder::class,
             GroupTableSeeder::class,
             UserTableSeeder::class
         ]);
    }
}
