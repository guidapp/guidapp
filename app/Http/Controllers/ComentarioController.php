<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comentario;
use App\Evento;
use App\Estabelecimento;
use App\Atracao;

class ComentarioController extends Controller
{
    public function listagemComentarios($model, $id_evento) {
        $object = null;
        if($model == 'evento') {
            $object = Evento::find($id_evento);
        } else if($model == 'estabelecimento') {
            $object = Estabelecimento::find($id_evento);
        } else if($model == 'atracao') {
            $object = Atracao::find($id_evento);
        } else {
            abort(404);
        }

        return view('comentarios')->with([
            'model' => $model,
            'object' => $object]);
    }

    public function addComentario(Request $request, $model, $id_evento) {
        $object = null;
        if($model == 'evento') {
            $object = Evento::find($id_evento);
        } else if($model == 'estabelecimento') {
            $object = Estabelecimento::find($id_evento);
        } else if($model == 'atracao') {
            $object = Atracao::find($id_evento);
        } else {
            abort(404);
        }

        $object->addComentario($request['texto']);

        return redirect('/comentarios/'.$model.'/'.$id_evento)
            ->with(['object' => $object,
                'model' => $model,
                'success' => 'Comentario adicionado com sucesso']);
    }
}
