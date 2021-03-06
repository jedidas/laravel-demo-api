<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Tag::class, function (Faker $faker) {
    $name = 'Tag ' . $this->faker->name . ' ' . $this->faker->name;
    return [
        'name' => $name,
        'slug' => Str::slug($name),
    ];
});
