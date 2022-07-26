<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
    	'package_id' => rand(1,10),
    	'guest_no' => $faker -> numberBetween($min = 1, $max = 20),
    	'booking_date'=> $faker -> dateTimeThisCentury->format('d-m-Y'),
    	'totalprice' => $faker -> numberBetween($min = 10000, $max = 999999),
    	'booking_remark' => $faker -> sentence,
    ];
});
