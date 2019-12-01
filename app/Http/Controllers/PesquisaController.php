<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class PesquisaController extends Controller
{
    function pesquisar(Request $request) {
        $busca = $request->busca;

        $eventos = Evento::where('nome', 'ilike', '%'.$busca.'%')
                            ->orWhere('descricao', 'ilike', '%'.$busca.'%')
                            ->get();

        return view('ResultadoPesquisa')->with([
            'busca' => $busca,
            'eventos' => $eventos]);
    }

    function pesquisarEvento($busca="") {
        $eventos = Evento::where('nome', 'ilike', '%'.$busca.'%')
                            ->orWhere('descricao', 'ilike', '%'.$busca.'%')
                            ->get();

        return view('ResultadoPesquisaEventos')->with([
            'busca' => $busca,
            'eventos' => $eventos]);
    }
}
