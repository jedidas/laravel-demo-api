<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderProduct;
use Faker\Generator as Faker;

$factory->define(OrderProduct::class, function (Faker $faker) {
    return [
        'product_id' => $this->faker->numberBetween(1, 900),
        'order_id' => $this->faker->numberBetween(1, 50),
    ];
});
