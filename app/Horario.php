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
        'fechamento' => 'required|after:abertura',
        'dia_semana' => 'string|required|max:15',
    ];

    public static $messages = [
        'string' => 'O campo :attribute deve ser texto',
        'required' => 'O campo :attribute é obrigatório',
        'after' => 'A hora do campo :attribute é inválida',
        'max' => 'O campo :attribute deve ter no máximo 15 caracteres',
    ];

    public function estabelecimento(){
        return $this->belongsTo(Estabelecimento::class);
    }
}
