<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendaIngresso extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'hash', 'usado', 'validado'
    ];

    public static $rules = [
        'hash' => 'required|string|max:255',
        'usado' => 'required|boolean',
        'validado' => 'required|boolean',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'max' => 'O campo :attribute deve ter no máximo 255 carateres',
    ];

    protected $casts = [
        'usado' => 'boolean',
        'validado' => 'boolean',
    ];

    public function ingresso(){
        return $this->belongsTo(Ingresso::class);
    }

    public function pagamento(){
        return $this->belongsTo(Pagamento::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function validar(){
        $this->validado = true;
        $this->save();
    }
}
