<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome'
    ];

    public static $rules = [
        'nome' => 'required|string|max:255',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'max' => 'O campo :attribute deve ter no máximo 255 carateres',
    ];

    public function pratos(){
        return $this->morphedByMany('App\Prato', 'taggable');
    }

    public function estabelecimentos(){
        return $this->morphedByMany('App\Estabelecimento', 'taggable');
    }

    public function eventos(){
        return $this->morphedByMany('App\Evento', 'taggable');
    }

    public function atracaos(){
        return $this->morphedByMany('App\Atracao', 'taggable');
    }
}
