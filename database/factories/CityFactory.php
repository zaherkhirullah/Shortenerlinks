<?php

use Faker\Generator as Faker;


$factory->define(App\City::class, function (Faker $faker) {
    return [
        'location' => $faker->address,

    ];
});