<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker) {
    return [
       'title' => $faker->title,
        'about' => $faker->text(1000),
        'user_id' => $faker->numberBetween(1,100),
    ];
});
