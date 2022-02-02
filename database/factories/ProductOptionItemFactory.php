<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductOptionItem;
use Faker\Generator as Faker;

$factory->define(ProductOptionItem::class, function (Faker $faker) {
    $name = $this->faker->realText($maxNbChars = 20, $indexSize = 2);
    return [
        'name' => $name,
        'price' => $this->faker->numberBetween(250, 5000),
        'image' => '',
        'active' => true,
        'product_option_id' => $this->faker->numberBetween(1, 8),
    ];
});
//['gasoline', 'door', 'rings', 'engine', 'cylinder_capacity', 'active', 'description', 'brand_id', 'brand_id'];
