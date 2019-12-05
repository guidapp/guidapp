<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atracao;
use Faker\Generator as Faker;

$factory->define(Atracao::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text(200),
        'evento_unico_id' => $faker->numberBetween(1,15),
        'horario' => $faker->time(),
        'tags' => $faker->text(200),
    ];
});
