<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingresso extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'descricao', 'preco', 'quantidade', 'desconto', 'dt_fim_promocao'
    ];

    public static $rules = [
        'descricao' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
        'quantidade' => 'required|integer|between:0,5000000',
        'desconto' => 'nullable|numeric|between:0,100',
        'dt_fim_promocao' => 'nullable|date|after_or_equal:today',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'max' => 'O campo :attribute deve ter no máximo 255 carateres',
    ];

    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    public function vendaIngresso(){
        return $this->belongsToMany(VendaIngresso::class);
    }
}
