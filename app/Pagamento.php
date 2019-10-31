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

    public function impulsionamentos(){
        return $this->belongsToMany(Impulsionamento::class);
    }

    public function vendaIngressos(){
        return $this->hasMany(VendaIngresso::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function gerarPagamento($user, $ingressosVendidos) {
        $this->vendaIngressos()->saveMany($ingressosVendidos);
        var_dump($this->vendaIngressos->count());

        $this->valor = 0;

        foreach ($ingressosVendidos as $vendaIngresso) {
            $this->valor += $vendaIngresso->ingresso->preco * (100-$vendaIngresso->ingresso->desconto) / 100;
        }

        $this->data_hora = date("Y-m-d H:i:s");
    }

    public function confirmarPagamento($id_pag_paypal) {
        $this->id_pag_paypal = $id_pag_paypal;
        var_dump($this->vendaIngressos->count());
        
        foreach ($this->vendaIngressos as $vendaIngresso) {
            $vendaIngresso->validar();
            // var_dump('validando');
        }
    }
}
