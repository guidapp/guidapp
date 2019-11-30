<?php

use Illuminate\Database\Seeder;

class ImagemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Imagem::class, 30)->create();
        factory(App\Imagem::class, 4)->create(['imagemable_id' => 1, 'imagemable_type' => "App\Evento"]);
    }
}
