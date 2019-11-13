<?php

use Illuminate\Database\Seeder;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // comentarios comuns
        factory(App\Comentario::class, 30)->create(['comentario_id' => null]);
        
        // respostas de comentarios
        factory(App\Comentario::class, 30)->create();
    }
}
