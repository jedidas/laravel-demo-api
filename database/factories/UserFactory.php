<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'avatar' => "https://randomuser.me/api/portraits/" . $this->faker->randomElement(["women", "men"]) . "/" . $this->faker->numberBetween(1, 99) . ".jpg",
        'name' => $this->faker->name(),
        'last_name' => $this->faker->lastName(),
        'email' => $this->faker->unique()->safeEmail(),
        'phone' => $this->faker->phoneNumber(),
        'birth_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => $this->faker->randomElement(["m", "f", null]),
        'description' => $this->faker->realText(500, 2),
        'email_verified_at' => now(),
        'password' => bcrypt("password"), // password
        'remember_token' => Str::random(10),
    ];
});
