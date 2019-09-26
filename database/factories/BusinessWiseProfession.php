<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Master\BusinessWiseProfession;
use Faker\Generator as Faker;

$factory->define(BusinessWiseProfession::class, function (Faker $faker) {
    return [
        'category_id' 				=> $faker->numberBetween($min = 1, $max = 2000),
        'profession_name' 			=> $faker->unique()->name,
        'profession_description' 	=> $faker->realText(rand(10,30)),
        'created_at' 				=> now(),
    ];
});
