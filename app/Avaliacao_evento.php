<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avaliacao_evento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'avaliacao'
    ];

    public static $rules = [
        'avaliacao' => 'required|numeric|between:0,5',
        /* 'evento_id' => 'required|numeric|exists:eventos,id',
        'user_id' => 'required|numeric|exists:users,id', */
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'numeric' => 'O campo :attribute deve ser um número',
        'between' => 'O campo :attribute deve ter um valor entre 0 e 5',
        /* 'nome.max' => 'O nome é muito grande (máx 500 caracteres)',
        'evento_id.exists' => 'Evento não existe',
        'user_id.exists' => 'Usuário não existe', */
    ];

    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
