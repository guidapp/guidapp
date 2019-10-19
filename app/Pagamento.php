<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagamento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'valor', 'data_hora', 'id_pag_paypal'
    ];

    public static $rules = [
        'valor' => 'required|numeric|min:0',
        'data_hora' => 'required|date|after_or_equal:-1 year',
        'id_pag_paypal' => 'required|string|max:255',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'max' => 'O campo :attribute deve ter no máximo 255 carateres',
    ];

    public function impulsionamento(){
        return $this->belongsToMany(Impulsionamento::class);
    }

    public function vendaIngresso(){
        return $this->belongsToMany(VendaIngresso::class);
    }

    public function Usuario(){
        return $this->belongsTo(User::class);
    }
}
