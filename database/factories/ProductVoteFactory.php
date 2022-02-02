<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductVote;
use Faker\Generator as Faker;

$factory->define(ProductVote::class, function (Faker $faker) {
    return [
        'vote' => $this->faker->boolean($chanceOfGettingTrue = 50),
        'user_id' => $this->faker->numberBetween(1, 7),
        'product_id' => $this->faker->numberBetween(1, 7),
    ];
});
