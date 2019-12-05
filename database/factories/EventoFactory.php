<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evento;
use App\Estabelecimento;
use Faker\Generator as Faker;

$factory->define(Evento::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text,
        'endereco' => $faker->address,
        'avaliacao' => $faker->numberBetween(1,5),
        'visitas' => $faker->numberBetween(0,10000),
        'hash' => $faker->text,
        'estabelecimento_id' => $faker->numberBetween(1,15),
        'user_id' => $faker->numberBetween(1,15),
        'data' => $faker->dateTimeBetween('now','+1 year'),
        'horario' => $faker->time(),
        'tags' => $faker->text(200),
    ];
});
