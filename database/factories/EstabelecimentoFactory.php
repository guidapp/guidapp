<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estabelecimento;
use Faker\Generator as Faker;

$factory->define(Estabelecimento::class, function (Faker $faker) {
    $aberto = rand(5,15);
    $fechado = rand($aberto+4, 23);

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
        'horario' => $faker->randomElement(
            ['Aberto de segunda a sexta, das '.$aberto.' às '.$fechado.'.', 
            'Aberto nos sábados, domingos e feridos, das '.$aberto.' às '.$fechado.'.',
            'Aberto todos os dias, exceto feriados, das '.$aberto.' às '.$fechado.'.',
            'Aberto de segunda a sábado, das '.$aberto.' às '.$fechado.'.',
            'Aberto nas segundas, quartas e sextas, das '.$aberto.' às '.$fechado.'.']),
        'tags' => $faker->text(200),
        'endereco' => $faker->address,
    ];
});
