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
        factory(App\Comentario::class, 15)->create(['comentario_id' => null, 'comentarioable_type' => 'App\\Evento']);
        factory(App\Comentario::class, 15)->create(['comentario_id' => null, 'comentarioable_type' => 'App\\Estabelecimento']);
        factory(App\Comentario::class, 15)->create(['comentario_id' => null, 'comentarioable_type' => 'App\\Prato']);
        factory(App\Comentario::class, 15)->create(['comentario_id' => null, 'comentarioable_type' => 'App\\Atracao']);
        
        // respostas de comentarios
        factory(App\Comentario::class, 30)->create();
    }
}
