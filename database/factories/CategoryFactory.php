<?php

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'description' => $faker->text(),
        'parent_id' => $faker->numberBetween(0, 20)
    ];
});
