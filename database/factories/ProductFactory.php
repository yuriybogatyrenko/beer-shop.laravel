<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'description' => $faker->text,
        'price' => $faker->numberBetween(100, 2000),
        'discount' => $faker->numberBetween(10, 50),
        'shop_id' => $faker->numberBetween(1, 20)
    ];
});
