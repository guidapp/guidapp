<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promocao;
use Faker\Generator as Faker;

$factory->define(Promocao::class, function (Faker $faker) {
    return [
        'texto' => $faker->text,
        'dia_semana' => $faker->numberBetween(1,7),
        'mes' => $faker->numberBetween(1,12),
        'data_inicial' => now(),
        'data_final' => $faker->dateTimeInInterval('now','+2 years'),
        'estabelecimento_id' => $faker->numberBetween(1,15)
    ];
});
