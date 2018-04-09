<?php

use Faker\Generator as Faker;

$factory->define(\App\OrderStatus::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'color' => $faker->hexColor,
        'icon' => null
    ];
});
