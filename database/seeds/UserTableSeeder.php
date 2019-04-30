<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\User::class, 10)->create()->each(function ($user){
            $user->roles()->attach(\App\Model\Role::all()->random(rand(1, 2))->pluck('id')->toArray());
            $user->groups()->attach(\App\Model\Group::all()->random(rand(1, 10))->pluck('id')->toArray());
        });
    }
}
