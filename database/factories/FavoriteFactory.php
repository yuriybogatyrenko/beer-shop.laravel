<?php

use Faker\Generator as Faker;

$factory->define(\App\Favorite::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,30),
        'user_id' => $faker->numberBetween(1,30),
    ];
});
