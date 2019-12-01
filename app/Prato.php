<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Auth;

class Prato extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome', 'descricao', 'preco'
    ];

    public static $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'numeric' => 'O preço deve ser um número',
        'min' => 'O preço deve ser um número positivo',
    ];

    public function imagem(){
        return $this->morphOne('App\Imagem', 'imagemable');
    }

    public function estabelecimento(){
        return $this->belongsTo(Estabelecimento::class);
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function comentarios(){
        return $this->morphMany('App\Comentario', 'comentarioable');
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

        $this->imagem()->save($imagem);
    }

    public function updateImagem($nomeImagem) {
        if(isset($this->imagem)) {
            $imagem = $this->imagem;
            $imagem->nome = $nomeImagem;
            $imagem->save();
        } else {
            $imagem = new Imagem;
            $imagem->nome = $nomeImagem;

            $this->imagem()->save($imagem);
        }
    }

    public function getModelName() {
        return 'prato';
    }
}
