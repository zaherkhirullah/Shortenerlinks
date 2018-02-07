<?php

use Faker\Generator as Faker;


$factory->define(App\file::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'about' => $faker->text(1000),
        'user_id' => $faker->numberBetween(1,100),
        'image_id' => $faker->numberBetween(1,100),
        'cover_id' => $faker->numberBetween(1,100),
    ];
});


