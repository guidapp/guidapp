<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EventoUnico;
use Faker\Generator as Faker;

$factory->define(EventoUnico::class, function (Faker $faker) {
    return [
        'latitude' => $faker->latitude(-8.8761834,-8.8916407),
        'longitude' => $faker->longitude(-36.4725389,-36.5037158),
        'data' => $faker->dateTimeBetween('now', '+3 days'),
        'evento_id' => $faker->numberBetween(1,15),
        'festival_id' => $faker->numberBetween(1,15)
    ];
});
