<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Master\Timezone;
use Faker\Generator as Faker;

$factory->define(Timezone::class, function (Faker $faker) {
    return [
        'city_name' 	  	=> $faker->city,
        'timezone_name' 	=> $faker->state,
        'timezone_gmt'  	=> $faker->state,
        'timezone_offset' 	=> $faker->numberBetween($min = 1, $max = 200),
        'created_at'		=> now(),
    ];
});
