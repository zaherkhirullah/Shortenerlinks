<?php

use Faker\Generator as Faker;

$factory->define(App\link::class, function (Faker $faker) {
    return [
        'post_type_id' => $faker->numberBetween(1,3),
        'content' => $faker->text(350),
        'user_id' => $faker->numberBetween(1,100),
        'isDeleted'=>$faker->boolean(40),
    ];
});
