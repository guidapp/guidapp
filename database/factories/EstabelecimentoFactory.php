<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estabelecimento;
use Faker\Generator as Faker;

$factory->define(Estabelecimento::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'descricao' => $faker->text(200),
        'telefone' => $faker->phoneNumber,
        'cidade' => $faker->randomElement(
            ['Garanhuns/PE', 
            'Bom Conselho/PE', 
            'Recife/PE', 
            'Caruaru/PE', 
            'Arapiraca/AL', 
            'Maceio/AL']),
        'user_id' => $faker->numberBetween(1,15),
        'horario' => $faker->text(200),
        'tags' => $faker->text(200),
    ];
});
