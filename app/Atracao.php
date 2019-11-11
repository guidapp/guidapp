<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Atracao extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome', 'descricao'
    ];

    public static $rules = [
        'nome' => 'required|string|max:500',
        'descricao' => 'string',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser um texto',
        'nome.max' => 'O nome é muito grande (máx 500 caracteres)',
    ];

    //public $validator = Validator::make($rules, $messages);

    public function cadastrar($data){
        $validator = Validator::make($data->all(),[Atracao::$rules, Atracao::$messages]);
        if ($validator->fails()) {
            return redirect('/cadastraratracao')
                        ->withErrors($validator)
                        ->withInput();
        }

        $this->nome = $data->nome;
        $this->descricao = $data->descricao;
        $this->save();
    }

    public function contato(){
        return $this->hasMany(Contato::class);
    }

    public function apresentacao(){
        return $this->hasMany(Apresentacao::class);
    }

    public function comentarios(){
        return $this->morphMany('App\Comentario', 'comentarioable');
    }

    public function imagems(){
        return $this->morphMany('App\Imagem', 'imagemable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
