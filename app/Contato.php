<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'texto'
    ];

    public static $rules = [
        'nome' => 'required',
        'descricao' => 'required',
        'preco' => 'required|numeric|min:0',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'preco:numeric|min' => 'O preço deve ser um número positivo',
    ];

    public function atracao(){
        return $this->belongsTo(Atracao::class);
    }
}
