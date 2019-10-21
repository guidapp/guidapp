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

    public function prato(){
        return $this->belongsToMany(Prato::class)
                    ->withPivot('prato_tag');
    }

    public function estabelecimento(){
        return $this->belongsToMany(Estabelecimento::class)
                    ->withPivot('estabelecimento_tag');
    }

    public function evento(){
        return $this->belongsToMany(Evento::class)
                    ->withPivot('evento_tag');
    }

    public function atracao(){
        return $this->belongsToMany(Atracao::class)
                    ->withPivot('atracao_tag');
    }
}
