<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Ingresso extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'descricao', 'preco', 'quantidade', 'desconto', 'dt_fim_promocao'
    ];

    public static $rules = [
        'descricao' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
        'quantidade' => 'required|integer|between:0,5000000',
        'desconto' => 'nullable|numeric|between:0,100',
        'dt_fim_promocao' => 'nullable|date|after_or_equal:today',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'max' => 'O campo :attribute deve ter no máximo 255 carateres',
    ];

    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    public function vendaIngressos(){
        return $this->hasMany(VendaIngresso::class);
    }

    public function criarVenda($user, $quantidade){
        $ingressosVendidos = [];

        for ($i=0; $i < $quantidade; $i++) { 
            $vendaIngresso = new VendaIngresso;
            $vendaIngresso->hash = Hash::make($this->evento->hash);
            $vendaIngresso->usado = false;
            $vendaIngresso->validado = false;

            $vendaIngresso->ingresso()->associate($this);
            $vendaIngresso->usuario()->associate($user);

            $vendaIngresso->save();

            $this->save();

            array_push($ingressosVendidos, $vendaIngresso);
        }

        return $ingressosVendidos;
    }

    public function quantidadeIngressosConfirmados() {
        // return $this->vendaIngressos->where('validado','true')->count();
        return VendaIngresso::where(['validado' => true, 'ingresso_id' => $this->id])->count();
    }
}
