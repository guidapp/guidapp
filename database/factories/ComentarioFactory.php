<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentario;
use Faker\Generator as Faker;

$factory->define(Comentario::class, function (Faker $faker) {
    return [
        'texto' => $faker->text,
        'lido' => $faker->boolean,
        'comentarioable_id' => $faker->numberBetween(1,15),
        'comentarioable_type' => $faker->randomElement(
            ['App\Atracao', 
            'App\Evento', 
            'App\Prato', 
            'App\Estabelecimento']),
        'user_id' => $faker->numberBetween(1,15),
        'comentario_id' => $faker->numberBetween(1,15),
        // 'estabelecimento_id' => $faker->numberBetween(1,15),
        // 'prato_id' => $faker->numberBetween(1,15),
        // 'evento_id' => $faker->numberBetween(1,15),
        // 'atracao_id' => $faker->numberBetween(1,15)
    ];
});
