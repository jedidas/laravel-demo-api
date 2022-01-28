<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => $this->faker->numberBetween(1, 120),
        'product_id' => $this->faker->numberBetween(1, 900),
        'active' => $this->faker->boolean($chanceOfGettingTrue = 50),
        'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
