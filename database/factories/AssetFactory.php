<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Asset;
use Faker\Generator as Faker;

$factory->define(Asset::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
