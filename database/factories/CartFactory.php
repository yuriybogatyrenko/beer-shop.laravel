<?php

use Faker\Generator as Faker;

$factory->define(\App\Cart::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,5),
        'user_id' => $faker->numberBetween(1,5),
        'quantity' => $faker->numberBetween(1,30)
    ];
});
