<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Festival extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'cidade'
    ];

    public static $rules = [
        'cidade' => 'required|string|max:255',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'max' => 'O campo :attribute deve ter no máximo 255 carateres',
    ];

    public function eventoUnico(){
        return $this->hasMany(EventoUnico::class);
    }

    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
