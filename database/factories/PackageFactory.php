<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Master\Package;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    return [
        'package_name' => $faker->unique()->name,
        'package_description' => $faker->text,
        'created_at' => now(),
    ];
});
