<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Group::class, 10)->create()->each(function ($group){
            $group->assets()->attach(\App\Model\Role::all()->random(rand(1, 2))->pluck('id')->toArray());
        });
    }
}
