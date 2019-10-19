<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'abertura', 'fechamento', 'dia_semana'
    ];

    public static $rules = [
        'abertura' => 'required',
        'fechamento' => 'required',
        'dia_semana' => 'required|string',
    ];

    public static $messages = [
        'string' => 'O campo :attribute deve ser texto',
        'required' => 'O campo :attribute é obrigatório',
    ];

    public function estabelecimento(){
        return $this->belongsTo(Estabelecimento::class);
    }
}
