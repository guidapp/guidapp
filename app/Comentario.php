<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Auth;

class Comentario extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'texto', 'lido'
    ];

    public static $rules = [
        'texto' => 'required|string|max:1500',
        'lido' => 'required|boolean',
        /* 'comentario_id' => 'nullable|numeric|exists:comentarios,id',
        'user_id' => 'nullable|numeric|exists:users,id',
        'estabelecimento_id' => 'nullable|numeric|exists:estabelecimentos,id',
        'prato_id' => 'nullable|numeric|exists:pratos,id',
        'evento_id' => 'nullable|numeric|exists:eventos,id',
        'atracao' => 'nullable|numeric|exists:atracaos,id', */
    ];

    public static $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'string' => 'O campo :attribute deve ser um texto',
        'boolean' => 'O campo :attribute deve ser um boleano',
        'texto.max' => 'O nome é muito grande',
        /* 'comentario_id.exists' => 'Comentario não existe',
        'numeric' => 'O campo :attribute deve ser um número',
        'user_id.exists' => 'Usuário não existe',
        'estabelecimento_id.exists' => 'Estabelecimento não existe',
        'prato_id.exists' => 'Prato não existe',
        'evento_id.exists' => 'Evento não existe',
        'atracao_id.exists' => 'Atração não existe', */
    ];

    public function comentarioable() {
        return $this->morphTo();
    }

    public function atracao(){
        return $this->belongsTo(Atracao::class);
    }

    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    public function prato(){
        return $this->belongsTo(Prato::class);
    }

    public function comentario(){
        return $this->belongsTo(Comentario::class);
    }

    public function respostas(){
        return $this->hasMany(Comentario::class);
    }

    public function estabelecimento(){
        return $this->belongsTo(Estabelecimento::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addResposta($texto) {
        $comentario = new Comentario;
        $comentario->texto = $texto;
        $comentario->lido = false;

        $comentario->usuario()->associate(Auth::user());
        $comentario->comentario()->associate($this);

        $this->comentarioable->comentarios()->save($comentario);
    }

    public static function naoLidosDestinadosAoUsuarioLogado() {
        // COMENTARIOS COMUNS
        $comentarios = Comentario::where('comentario_id', '=', null)
            ->where('lido', '=', false)
            ->get();
        $comentariosDestinadosAoUsuarioLogado = [];
        foreach ($comentarios as $comentario) {
            if(Auth::user()->can('responderComentario', $comentario->comentarioable))
                array_push($comentariosDestinadosAoUsuarioLogado, $comentario);
        }

        // RESPOSTAS DE COMENTARIOS
        $respostas = Comentario::where('comentario_id', '<>', null)
            ->where('lido', '=', false)
            ->get()
            ->where('comentario.user_id', '=', Auth::id());
        
        return ['comentarios' => $comentariosDestinadosAoUsuarioLogado, 'respostas' => $respostas];
    }

    public static function marcarComentariosComoLidos($comentarioable) {
        $comentarios = $comentarioable->comentarios;
        foreach ($comentarios as $comentario) {
            
            // COMENTARIOS COMUNS (ORGANIZADOR)
            if(Auth::user()->can('responderComentario', $comentarioable) && !$comentario->lido) {
                $comentario->lido = true;
                $comentario->save();
                
                $comentario['lidoAgora'] = true;
            }

            // RESPOSTAS DE COMENTARIOS (USUARIO COMUM)
            foreach ($comentario->respostas as $resposta) {
                if($resposta->comentario->usuario->id == Auth::id() && !$resposta->lido) {
                    $resposta->lido = true;
                    $resposta->save();
            
                    $resposta['lidoAgora'] = true;
                }
            }
        }
    }
}
