<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $number = $this->faker->unique()->numberBetween(0, 6);

    //
    $cars = array('Clubman', 'Convertible', 'Cooper Countryman', 'Cooper S Clubman', 'Cooper S Countryman', 'Smart ForTwo Electric Drive', 'MINI Cooper S');
    $name = $cars[$number];
    $speed = array(137, 140, 110, 160, 180, 173, 153);
    $hp = array(220, 290, 240, 310, 260, 300, 286);

    return [
        'code' => $this->faker->isbn13,
        'name' => $name,
        'slug' => Str::slug($name),
        'image' => "/uploads/products/car-" . $number . "-angular-front.png",
        'price' => $this->faker->randomNumber(5),
        'discount' => $this->faker->numberBetween(0, 30),
        'active' => true,
        //
        'speed' => $speed[$number],
        'hp' => $hp[$number],
        'passenger' => $this->faker->randomElement($array = array(2, 4, 5)),
        'transmission' => $this->faker->randomElement($array = array('Manual', 'Automatic', 'CVT', 'Semi-automatic')),
        //
        'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'brand_id' => $this->faker->numberBetween(1, 7),
    ];
});
