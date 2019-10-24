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

    public function tag(){
        return $this->hasMany(Tag::class);
    }

    public function comentario(){
        return $this->hasMany(Comentario::class);
    }
}
