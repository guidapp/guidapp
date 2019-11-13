<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comentario;
use App\Evento;

class ComentarioController extends Controller
{
    public function listagemComentariosEvento($id_evento) {
        $evento = Evento::find($id_evento);

        return view('comentariosEvento')->with('evento', $evento);
    }

    public function addComentarioEvento(Request $request, $id_evento) {
        $evento = Evento::find($id_evento);

        $evento->addComentario($request['texto']);

        return redirect('/evento/'.$id_evento.'/comentarios')
            ->with(['evento' => $evento,
                'success' => 'Comentario adicionado com sucesso']);
    }
}
