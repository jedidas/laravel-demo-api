<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'code' => $this->faker->isbn13,
        'instructions' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'created' => $this->faker->dateTime(),
        'status_id' => $this->faker->numberBetween(1, 7),
        'user_id' => $this->faker->numberBetween(1, 120),
    ];
});
