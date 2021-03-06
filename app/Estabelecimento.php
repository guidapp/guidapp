<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Auth;


class Estabelecimento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome', 'latitude', 'longitude', 'endereco', 'descricao', 'telefone', 'cidade', 'horario', 'tags'
    ];

    public static $rules = [
        'nome' => 'required|string|max:255',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'endereco' => 'required|string|max:255',
        'descricao' => 'required|string|max:255',
        'telefone' => 'required|string',
        'cidade' => 'required|string',
        'horario' => 'required|string|max:255',
        'tags' => 'nullable|string',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'numeric' => 'O campo :attribute deve ser numérico',
        'max' => 'O campo :attribute deve tem no máximo 255 caracteres'
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function eventos(){
        return $this->hasMany(Evento::class);
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function pratos(){
        return $this->hasMany(Prato::class);
    }

    public function promocaos(){
        return $this->hasMany(Promocao::class);
    }

    public function imagems(){
        return $this->morphMany('App\Imagem', 'imagemable');
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    public function avaliacaos(){
        return $this->belongsToMany(User::class)->using(EstabelecimentoUser::class)->withPivot('avaliacao');
    }

    public function organizador(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comentarios(){
        return $this->morphMany('App\Comentario', 'comentarioable');
    }

    public function getAvaliacaoGeral(){
        $qnt = $this->avaliacaos->count();
        $soma = 0;

        // var_dump($this->avaliacaos);

        foreach ($this->avaliacaos as $avaliacao) {
            $soma += $avaliacao->pivot->avaliacao;
        }

        if($qnt > 0) {
            return $soma/$qnt;
        }

        return 0;
    }

    public function addComentario($texto) {
        $comentario = new Comentario;
        $comentario->texto = $texto;
        $comentario->lido = false;

        $comentario->usuario()->associate(Auth::user());

        $this->comentarios()->save($comentario);
    }

    public function addImagem($nomeImagem) {
        $imagem = new Imagem;
        $imagem->nome = $nomeImagem;

        $this->imagems()->save($imagem);
    }

    public function updateImagem($nomeImagem) {
        if($this->imagems->count() > 0) {
            $imagem = $this->imagems[0];
            $imagem->nome = $nomeImagem;
            $imagem->save();
        } else {
            $imagem = new Imagem;
            $imagem->nome = $nomeImagem;

            $this->imagems()->save($imagem);
        }
    }

    public function getModelName() {
        return 'estabelecimento';
    }
}
