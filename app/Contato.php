<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'texto'
    ];

    public static $rules = [
        'texto' => 'required|string|max:255',
        'atracao_id' => 'required'
    ];

    public static $messages = [
        'string' => 'O campo :attribute deve ser texto',
    ];

    public function atracao(){
        return $this->belongsTo(Atracao::class);
    }
}
