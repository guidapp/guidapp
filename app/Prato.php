<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'preco:numeric|min' => 'O preço deve ser um número positivo',
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
}
