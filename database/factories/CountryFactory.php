<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Master\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'country_name' => $faker->unique()->country,
        'country_code' => $faker->numberBetween($min = 1, $max = 200),
        'created_at' => now(),
    ];
});
