<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocao extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'texto', 'dia_semana', 'mes', 'data_inicial', 'data_final'
    ];

    public static $rules = [
        'texto' => 'required|string|max:255',
        'domingo' => 'nullable|boolean',
        'segunda' => 'nullable|boolean',
        'terca' => 'nullable|boolean',
        'quarta' => 'nullable|boolean',
        'quinta' => 'nullable|boolean',
        'sexta' => 'nullable|boolean',
        'sabado' => 'nullable|boolean',
        'data_inicial' => 'required|date|after_or_equal:today',
        'data_final' => 'required|date|after_or_equal:data_inicial',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'max' => 'O campo :attribute deve ter no máximo 255 carateres',
    ];

    public function imagems(){
        return $this->morphMany('App\Imagem', 'imagemable');
    }

    public function estabelecimento(){
        return $this->belongsTo(Estabelecimento::class);
    }
}
