<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Destination;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

$factory->define(Destination::class, function (Faker $faker) {
	static $id=1;
	$filepath=public_path('storage/images/destination/'.$id++.'/');
	if(!File::exists($filepath)){
        File::makeDirectory($filepath);
    }
    return [
      'name' => $faker->name,
      'description' => $faker->paragraph,
      'image'=>json_encode(array($faker->image($filepath,980,640, null, false))),
      'city' => $faker->city,
      'division' =>$faker->state,
      'create_user_id'=>factory('App\User')->create()->id,
      
    ];
});
