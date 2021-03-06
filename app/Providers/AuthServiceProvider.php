<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Evento;
use App\Estabelecimento;
use App\Prato;
use App\Atracao;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('responderComentario', function ($user, $object) {
            if(get_class($object) == 'App\\Evento') {
                $evento = Evento::find($object->id);
                return $user->id == $evento->organizador->id;
            } else if(get_class($object) == 'App\\Estabelecimento') {
                $estabelecimento = Estabelecimento::find($object->id);
                return $user->id == $estabelecimento->organizador->id;
            } else if(get_class($object) == 'App\\Prato') {
                $prato = Prato::find($object->id);
                return $user->id == $prato->estabelecimento->organizador->id;
            } else if(get_class($object) == 'App\\Atracao') {
                $atracao = Atracao::find($object->id);
                return $user->id == $atracao->evento_unico->evento->organizador->id;
            } else {
                return false;
            }
        });

        Gate::define('editarPrato', function ($user, $object) {
            $prato = Prato::find($object->id);

            if(!isset($prato->estabelecimento))
                return false;

            if(!isset($prato->estabelecimento->usuario))
                return false;

            return $prato->estabelecimento->usuario->id == Auth::id();
        });

        Gate::define('editarEstabelecimento', function ($user, $object) {
            $estabelecimento = Estabelecimento::find($object->id);

            if(!isset($estabelecimento->usuario))
                return false;

            return $estabelecimento->usuario->id == Auth::id();
        });

        Gate::define('editarEvento', function ($user, $object) {
            $evento = Evento::find($object->id);

            if(!isset($evento->organizador))
                return false;

            return $evento->organizador->id == Auth::id();
        });

        Gate::define('editarAtracao', function ($user, $object) {
            $atracao = Atracao::find($object->id);

            if(!isset($atracao->evento))
                return false;

            return Gate::allows('editarEvento', $atracao->evento);
        });
    }
}
