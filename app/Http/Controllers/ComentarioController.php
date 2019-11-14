<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comentario;
use App\Evento;
use App\Estabelecimento;
use App\Atracao;
use App\Prato;

use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function listagemComentarios($model, $id) {
        $object = $this->getObject($model, $id);
        if(!$object)
            abort(404);

        Comentario::marcarComentariosComoLidos($object);
        
        return view('comentarios')->with(['object' => $object]);
    }

    public function listagemComentariosUsuario() {
        $naoLidos = Comentario::naoLidosDestinadosAoUsuarioLogado();

        $comentarios = collect($naoLidos['comentarios'])->groupBy(['comentarioable_type', 'comentarioable_id']);
        $respostas = collect($naoLidos['respostas'])->groupBy(['comentarioable_type', 'comentarioable_id']);

        return view('comentariosNaoLidos')->with([
            'comentarios' => $comentarios,
            'respostas' => $respostas]);
    }

    public function addComentario(Request $request, $model, $id) {
        $object = $this->getObject($model, $id);
        if(!$object)
            abort(404);

        $object->addComentario($request['texto']);

        return redirect('/comentarios/'.$model.'/'.$id)
            ->with(['object' => $object,
                'success' => 'Comentario adicionado com sucesso']);
    }

    public function responderComentario(Request $request, $id) {
        $comentario = Comentario::find($id);

        $this->authorize('responderComentario', $comentario->comentarioable);

        $comentario->addResposta($request['texto']);

        return redirect('/comentarios/'.$comentario->comentarioable->getModelName().'/'.$comentario->comentarioable->id)
            ->with(['object' => $comentario->comentarioable,
                'success' => 'Resposta adicionada com sucesso']);
    }

    private function getObject($model, $id) {
        $object = null;

        if($model == 'evento') {
            $object = Evento::find($id);
        } else if($model == 'estabelecimento') {
            $object = Estabelecimento::find($id);
        } else if($model == 'atracao') {
            $object = Atracao::find($id);
        } else if($model == 'prato') {
            $object = Prato::find($id);
        }

        return $object;
    }
}
