<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Brand::class, function (Faker $faker) {
    $name = 'Brand ' . $this->faker->name . ' ' . $this->faker->name;
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'image' => '',
        'active' => $this->faker->boolean($chanceOfGettingTrue = 50),
        'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});
