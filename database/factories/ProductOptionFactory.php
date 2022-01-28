<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductOption;
use Faker\Generator as Faker;

$factory->define(ProductOption::class, function (Faker $faker) {
    $name = $this->faker->realText($maxNbChars = 20, $indexSize = 2);
    return [
        'name' => $name,
        'required' => $this->faker->boolean($chanceOfGettingTrue = 50),
        'multiple' => $this->faker->boolean($chanceOfGettingTrue = 50),
        'min_count' => $this->faker->numberBetween(1, 10),
        'max_count' => $this->faker->numberBetween(15, 40),
        'options' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'active' => $this->faker->boolean($chanceOfGettingTrue = 50),
        'product_id' => $this->faker->numberBetween(1, 300),
    ];
});
