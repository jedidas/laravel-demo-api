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
        'min_count' => $this->faker->numberBetween(1, 1),
        'max_count' => $this->faker->numberBetween(2, 4),
        'options' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'active' => true,
        'product_id' => $this->faker->numberBetween(1, 7),
    ];
});
