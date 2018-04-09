<?php

use Faker\Generator as Faker;

$factory->define(\App\OrderList::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,20),
        'product_price' => $faker->numberBetween(500, 2000),
        'product_discount' => $faker->numberBetween(5, 50),
        'quantity' => $faker->numberBetween(1, 20),
        'order_id' => $faker->numberBetween(1, 100)
    ];
});
