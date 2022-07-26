<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

$factory->define(User::class, function (Faker $faker) {
    /**
     * $id = user id 
     * @var integer
     */
	static $id=1;
	static $type,$name,$email,$pwd;
	if($id==1) {
    	$type=0;
    	$name='admin';
    	$email="admin@gmail.com";
    	$pwd=bcrypt('admin123');
    }
    else {
    	$type=1;
    	$name=$faker->name;
    	$email=$faker->unique()->safeEmail;
    	$pwd=bcrypt('11111111');
    }
	$filepath=public_path('storage/images/user/'.$id++.'/');
	if(!File::exists($filepath)) {
        File::makeDirectory($filepath);
    }
    return [
        'name' => $name,
        'email' => $email,
        'status'=>1,
        'type'=>$type,
        'profile'=>$faker->image($filepath,50,50, null, false),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'password' =>$pwd,
        'dob' => $faker->date('Y-m-d'),
        'remember_token' => Str::random(10),
        'created_at'=>$faker->date('Y-m-d H:i:s'),
        'updated_at' =>$faker->date('Y-m-d H:i:s'),
    ];
});
