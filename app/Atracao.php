<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;


class Atracao extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome', 'descricao', 'hora'
    ];

    public static $rules = [
        'nome' => 'required|string|max:500',
        'descricao' => 'nullable|string',
        'hora' => 'required|after_or_equal:today',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser um texto',
        'nome.max' => 'O nome é muito grande (máx 500 caracteres)',
        'after_or_equal' => 'A hora do campo :attribute é inválida',
    ];

    public function contato(){
        return $this->hasMany(Contato::class);
    }

    public function apresentacaos(){
        return $this->hasMany(Apresentacao::class);
    }

    public function comentarios(){
        return $this->morphMany('App\Comentario', 'comentarioable');
    }

    public function imagems(){
        return $this->morphMany('App\Imagem', 'imagemable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function evento_unico(){
        return $this->belongsTo(EventoUnico::class);
    }

    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    public function addComentario($texto) {
        $comentario = new Comentario;
        $comentario->texto = $texto;
        $comentario->lido = false;

        $comentario->usuario()->associate(Auth::user());

        $this->comentarios()->save($comentario);
    }

    public function addImagem($nomeImagem) {
        $imagem = new Imagem;
        $imagem->nome = $nomeImagem;

        $this->imagems()->save($imagem);
    }

    public function updateImagem($nomeImagem) {
        if($this->imagems->count() > 0) {
            $imagem = $this->imagems[0];
            $imagem->nome = $nomeImagem;
            $imagem->save();
        } else {
            $imagem = new Imagem;
            $imagem->nome = $nomeImagem;

            $this->imagems()->save($imagem);
        }
    }

    public function getModelName() {
        return 'atracao';
    }
}
