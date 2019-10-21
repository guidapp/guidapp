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

    public function ingresso(){
        return $this->hasOne(Ingresso::class);
    }

    public function pagamento(){
        return $this->hasMany(Pagamento::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
