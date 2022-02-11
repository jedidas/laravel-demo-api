<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductTag;
use Faker\Generator as Faker;

$factory->define(ProductTag::class, function (Faker $faker) {
    return [
        'tag_id' => $this->faker->numberBetween(1, 60),
        'product_id' => $this->faker->numberBetween(1, 900)
    ];
});
