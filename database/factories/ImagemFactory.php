<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Imagem;
use Faker\Generator as Faker;

$factory->define(Imagem::class, function (Faker $faker) {
    return [
        'nome' => $faker->text,
        'imagemable_id' => $faker->numberBetween(1,15),
        'imagemable_type' => $faker->randomElement(
            ['App\Atracao', 
            'App\Evento', 
            'App\Prato', 
            'App\Promocao', 
            'App\Estabelecimento', 
            'App\Usuario']),
    ];
});
