<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 15)->create()->each(function ($user) {
            $user->imagem()->save(factory('App\Imagem')->make());

            $user->estabelecimentos()->saveMany(factory('App\Estabelecimento', 2)->make());

            foreach ($user->estabelecimentos as $estabelecimento) {
                $estabelecimento->imagems()->saveMany(factory('App\Imagem', 3)->make());
                
                $estabelecimento->pratos()->saveMany(factory('App\Prato', 3)->make());

                foreach ($estabelecimento->pratos as $prato) {
                    $prato->imagem()->save(factory('App\Imagem')->make());
                }

                $estabelecimento->eventos()->saveMany(factory('App\Evento', 2)->make());

                foreach ($estabelecimento->eventos as $evento) {
                    $evento->imagems()->saveMany(factory('App\Imagem', 3)->make());

                    $evento->atracaos()->saveMany(factory('App\Atracao', 3)->make());

                    foreach ($evento->atracaos as $atracao) {
                        $atracao->imagems()->saveMany(factory('App\Imagem', 3)->make());
                    }
                }
            }
        });
    }
}
