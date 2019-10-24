<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome', 'descricao', 'avaliacao', 'visitas', 'hash'
    ];

    public static $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string|max:3000',
        'avaliacao' => 'required|between:0,5',
        'visitas' => 'required|integer|min:0',
        'hash' => 'required|string',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'nome.max' => 'O campo deve no máx. 255 caracteres',
        'descricao.max' => 'O campo deve ter no máx. 3000 caracteres',
        'between' => 'O campo :attribute deve ter um valor entre 0 e 5',
    ];

    public function imagems(){
        return $this->morphMany('App\Imagem', 'imagemable');
    }
    
    public function tag(){
        return $this->hasMany(Tag::class);
    }

    public function estabelecimento(){
        return $this->belongsTo(Estabelecimento::class);
    }

    public function comentarios(){
        return $this->morphMany('App\Comentario', 'comentarioable');
    }

    public function avaliacao(){
        return $this->hasMany(Avaliacao_evento::class);
    }

    public function organizador(){
        return $this->belongsTo(User::class);
    }

    public function ingresso(){
        return $this->hasMany(Ingresso::class);
    }

    public function impulsionamento(){
        return $this->hasMany(Impulsionamento::class);
    }

    public function eventoUnico(){
        return $this->hasMany(EventoUnico::class);
    }

    public function festival(){
        return $this->hasMany(Festival::class);
    }
}
