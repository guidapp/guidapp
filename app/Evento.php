<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Auth;

class Evento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome', 'descricao', 'avaliacao', 'visitas', 'hash', 'endereco',
    ];

    protected $appends = ['qntComentariosNaoLidos'];

    public static $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string|max:255',
        'endereco' => 'required|string|max:255',
        'horario'   => 'required',
        'data'      => 'required|date',
        // 'avaliacao' => 'required|between:0,5',
        // 'visitas' => 'required|integer|min:0',
        // 'hash' => 'required|string',
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser texto',
        'nome.max' => 'O campo deve no máx. 255 caracteres',
        'descricao.max' => 'O campo deve ter no máx. 3000 caracteres',
        'between' => 'O campo :attribute deve ter um valor entre 0 e 5',
    ];

    public function getQntComentariosNaoLidosAttribute() {
        return $this->comentarios->where('lido', false)->count();
    }

    public function imagems(){
        return $this->morphMany('App\Imagem', 'imagemable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function estabelecimento(){
        return $this->belongsTo(Estabelecimento::class);
    }

    public function comentarios(){
        return $this->morphMany('App\Comentario', 'comentarioable')->where('comentario_id', null);
    }

    public function avaliacao(){
        return $this->hasMany(Avaliacao_evento::class);
    }

    public function organizador(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ingressos(){
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

    public function atracaos(){
        return $this->hasMany(Atracao::class);
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

    public function addEventoUnico($request) {
        $evento_unico = new EventoUnico;
		$evento_unico->latitude = $request->latitude;
		$evento_unico->longitude = $request->longitude;
		$evento_unico->data = $request->dataEvento;
        
        $this->eventoUnico()->save($evento_unico);
    }

    public function addAtracao($atracao) {
        if(!isset($evento_unico)) {
            $this->addEventoUnico();
        }

        $this->eventoUnico[0]->save($atracao);
    }

    public function getAtracoes() {
        return $this->eventoUnico[0]->atracaos;
    }

    public function getModelName() {
        return 'evento';
    }
}
