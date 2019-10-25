<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome'
    ];

    public static $rules = [
        'nome' => 'required|string',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
    ];

    public function imagemable() {
        return $this->morphTo();
    }
}
