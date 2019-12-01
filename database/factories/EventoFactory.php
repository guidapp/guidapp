<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evento;
use App\Estabelecimento;
use Faker\Generator as Faker;

$factory->define(Evento::class, function (Faker $faker) {
    $estabelecimento = Estabelecimento::find($faker->numberBetween(1,15));

    return [
        'nome' => $faker->name,
        'descricao' => $faker->text,
        'avaliacao' => $faker->numberBetween(1,5),
        'visitas' => $faker->numberBetween(0,10000),
        'hash' => $faker->text,
        'estabelecimento_id' => $estabelecimento->id,
        'user_id' => $estabelecimento->organizador->id
    ];
});
