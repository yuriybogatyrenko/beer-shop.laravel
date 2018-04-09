<?php

use Faker\Generator as Faker;

$factory->define(\App\City::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'country_id' => $faker->numberBetween(1,20)
    ];
});
