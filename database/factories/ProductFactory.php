<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {

    //
    $name = $this->faker->realText($maxNbChars = 20, $indexSize = 2);
    return [
        'code' => $this->faker->isbn13,
        'name' => $name,
        'slug' => Str::slug($name),
        'image' => "https://randomuser.me/api/portraits/" . $this->faker->randomElement(["women", "men"]) . "/" . $this->faker->numberBetween(1, 99) . ".jpg",
        'price' => $this->faker->randomNumber(5),
        'discount' => $this->faker->numberBetween(0, 30),
        'active' => $this->faker->boolean($chanceOfGettingTrue = 50),
        'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'brand_id' => $this->faker->numberBetween(1, 50),
    ];
});
