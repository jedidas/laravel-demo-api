<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductOptionItem;
use Faker\Generator as Faker;

$factory->define(ProductOptionItem::class, function (Faker $faker) {
    $name = $this->faker->realText($maxNbChars = 20, $indexSize = 2);
    return [
        'name' => $name,
        'price' => $this->faker->numberBetween(2500, 10000),
        'image' => '',
        'active' => $this->faker->boolean($chanceOfGettingTrue = 50),
        'product_option_id' => $this->faker->numberBetween(1, 500),
    ];
});
