<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => $this->faker->numberBetween(1, 7),
        'product_id' => $this->faker->numberBetween(1, 7),
        'active' => true,
        'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
