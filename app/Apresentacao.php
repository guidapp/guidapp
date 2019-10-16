<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apresentacao extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'hora'
    ];

    public static $rules = [
        'hora' => 'required|after_or_equal:today',
        'atracao_id' => 'required|numeric|exists:atracaos,id',
        'evento_unico_id' => 'required|numeric|exists:evento_unicos,id',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'after_or_equal' => 'A hora do campo :attribute é inválida',
        'numeric' => 'O atributo :attribute deve ser numérico',
        'atracao_id.exists' => 'Id de atração inválido',
        'evento_unico_id.exists' => 'Id de evento único inválido',
    ];

    public function atracao(){
        return $this->belongsTo(Atracao::class);
    }

    public function evento_unico(){
        return $this->belongsTo(EventoUnico::class);
    }
}
