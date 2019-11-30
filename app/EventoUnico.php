<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventoUnico extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'latitude', 'longitude', 'data'
    ];

    public static $rules = [
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'data' => 'required|date|after_or_equal:today',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'numeric' => 'O campo :attribute deve ser numérico',
        'data' => 'O campo :attribute deve ser uma data',
        'after_or_equal' => 'O campo :attribute deve ter data igual ou posterior a hoje',
    ];

    public function atracaos(){
        return $this->hasMany(Atracao::class);
    }

    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    public function festival(){
        return $this->belongsTo(Festival::class);
    }
}
