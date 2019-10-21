<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstabelecimentoUser extends Pivot
{
    use SoftDeletes;
    protected $fillable = [
        'avaliacao'
    ];

    public static $rules = [
        'avaliacao' => 'required|numeric|between:0,5',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'numeric' => 'O campo :attribute deve ser um número',
        'between' => 'O campo :attribute deve ter um valor entre 0 e 5',
    ];

    public function estabelecimento(){
        return $this->belongsTo(Estabelecimento::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
