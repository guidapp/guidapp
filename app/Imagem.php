<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome'
    ];

    public static $rules = [
        'nome' => 'required|string',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
    ];

    public function atracao(){
        return $this->belongsTo(EventoUnico::class);
    }

    public function evento(){
        return $this->belongsTo(EventoUnico::class);
    }

    public function prato(){
        return $this->belongsTo(EventoUnico::class);
    }

    public function promocao(){
        return $this->belongsTo(EventoUnico::class);
    }

    public function estabelecimento(){
        return $this->belongsTo(EventoUnico::class);
    }

    public function usuario(){
        return $this->belongsTo(EventoUnico::class);
    }
}
