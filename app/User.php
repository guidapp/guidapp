<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'cpf',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
        'cpf' => 'nullable|digits:11|unique:users,cpf',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'password:min' => 'A senha deve ter no mínimo 8 caracteres',
    ];

    public function imagem(){
        return $this->morphOne('App\Imagem', 'imagemable');
    }

    public function eventos(){
        return $this->hasMany('App\Evento');
    }

    public function estabelecimentos(){
        return $this->hasMany('App\Estabelecimento');
    }

    public function avaliacaoEstabelecimentos(){
        return $this->hasMany(Estabelecimento::class)->using(EstabelecimentoUser::class);
    }

    public function comentarios(){
        return $this->morphMany('App\Comentario', 'comentarioable');
    }

    public function avaliacaoEventos(){
        return $this->hasMany(Avaliacao_evento::class);
    }

    public function organizador(){
        return $this->hasOne(Organizador::class);
    }

    public function compraIngressos(){
        return $this->hasMany(VendaIngresso::class);
    }

    public function pagamentos(){
        return $this->hasMany(Pagamento::class);
    }
    
    public function ehOrganizador(){
        return $this->cpf != null;
    }
    public function tornarOrganizador($cpf) {
        $this->cpf = $cpf;
    }
}
