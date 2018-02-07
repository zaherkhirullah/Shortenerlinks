<?php

use Faker\Generator as Faker;

$factory->define(App\Domain::class, function (Faker $faker) {
    return [
             'path' => $faker->text,
        'isDeleted' => $faker->boolean(10),
        'user_id' => $faker->numberBetween(1,100),
        'album_id' => $faker->numberBetween(1,100),
    ];
});
