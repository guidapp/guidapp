<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prato;
use Faker\Generator as Faker;

$factory->define(Prato::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text,
        'preco' => $faker->numberBetween(50,200),
        'estabelecimento_id' => $faker->numberBetween(1,15),
        'tags' => $faker->text,
    ];
});
