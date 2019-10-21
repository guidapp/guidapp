<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingresso;
use Faker\Generator as Faker;

$factory->define(Ingresso::class, function (Faker $faker) {
    return [
        'descricao' => $faker->text,
        'preco' => $faker->numberBetween(5,60),
        'quantidade' => $faker->numberBetween(0,500),
        'desconto' => $faker->numberBetween(0,30),
        'dt_fim_promocao' => $faker->dateTimeInInterval('now','+1 year'),
        'evento_id' => $faker->numberBetween(1,15)
    ];
});
