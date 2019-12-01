<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Imagem;
use Faker\Generator as Faker;

$factory->define(Imagem::class, function (Faker $faker) {
    return [
        'nome' =>  "images/evento".$faker->numberBetween(1,7).".jpg",
        'imagemable_id' => $faker->numberBetween(1,15),
        'imagemable_type' => $faker->randomElement(
            ['App\Atracao', 
            'App\Evento', 
            'App\Prato', 
            'App\Promocao', 
            'App\Estabelecimento', 
            'App\User']),
    ];
});
