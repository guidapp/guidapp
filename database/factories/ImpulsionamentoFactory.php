<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Impulsionamento;
use Faker\Generator as Faker;

$factory->define(Impulsionamento::class, function (Faker $faker) {
    return [
        'data_inicial' => now(),
        'data_final' => $faker->dateTimeInInterval('now','+2 years'),
        'preco_dia' => $faker->numberBetween(2,8),
        'data_compra' => $faker->dateTimeInInterval('now','-2 years'),
        'evento_id' => $faker->numberBetween(1,15),
        'pagamento_id' => $faker->numberBetween(1,15)
    ];
});
