<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promocao;
use Faker\Generator as Faker;

$factory->define(Promocao::class, function (Faker $faker) {
    return [
        'texto' => $faker->text,
        'domingo' => $faker->boolean,
        'segunda' => $faker->boolean,
        'terca' => $faker->boolean,
        'quarta' => $faker->boolean,
        'quinta' => $faker->boolean,
        'sexta' => $faker->boolean,
        'sabado' => $faker->boolean,
        'data_inicial' => now(),
        'data_final' => $faker->dateTimeInInterval('now','+2 years'),
        'estabelecimento_id' => $faker->numberBetween(1,15)
    ];
});
