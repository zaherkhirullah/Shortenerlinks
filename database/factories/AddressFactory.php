<?php

use Faker\Generator as Faker;


$factory->define(App\Address::class, function (Faker $faker) {
    return [
       
       return [





       	
        'post_type_id' => $faker->numberBetween(1,1000),
        'post_type' => $faker->text(350),
        'user_id' => $faker->numberBetween(1,100),
        'about' => $faker->text(1000),
        'cover_id' => $faker->numberBetween(1,100),
        'avatar_id' => $faker->numberBetween(1,100),
        'Location_id' => $faker->numberBetween(1,100),
        'path' => $faker->text,
        'isDeleted' => $faker->boolean(10),
        'user_id' => $faker->numberBetween(1,100),
        'album_id' => $faker->numberBetween(1,100),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->dateTime,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->userName,
        'password' => $password ?: $password = bcrypt('secret'),
        'confirm_email' => $faker->boolean(80),
        'isActive' => $faker->boolean(90),
        'remember_token' => str_random(10),
        'path' => $faker->title,
        'isDeleted' => $faker->boolean(10),
        'user_id' => $faker->numberBetween(1,100),
        ];

    ];
});
