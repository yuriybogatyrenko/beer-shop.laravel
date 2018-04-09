<?php

use Faker\Generator as Faker;

$factory->define(\App\Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,20),
        'comment' => $faker->text(),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'delivery_time' => $faker->time('H:i:s', 'now'),
        'order_status_id' => $faker->numberBetween(1,5)
    ];
});
