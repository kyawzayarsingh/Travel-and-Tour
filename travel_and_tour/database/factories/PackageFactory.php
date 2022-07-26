<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Package;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    return [
        'destination_id' =>function () {
            return factory(App\Destination::class)->create()->id;
        },
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'price'=> $faker-> numberBetween($min = 1, $max = 999999),
        'create_user_id'=>factory('App\User')->create()->id,
    ];
});
