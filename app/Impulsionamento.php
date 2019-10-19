<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Impulsionamento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'data_inicial', 'data_final', 'preco_dia', 'data_compra'
    ];

    public static $rules = [
        'data_inicial' => 'required|date|after_or_equal:today',
        'data_final' => 'required|date|after_or_equal:data_inicial',
        'preco_dia' => 'required|numeric|min:0',
        'data_compra' => 'required|date|after_or_equal:-2 years',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'date' => 'O campo :attribute deve ser uma data válida',
        'preco_dia.min' => 'O campo :attribute não pode receber valores negativos',
    ];

    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    public function pagamento(){
        return $this->hasOne(Pagamento::class);
    }
}
