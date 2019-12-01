<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Estabelecimento;

class PesquisaController extends Controller
{
    function pesquisar(Request $request) {
        $busca = $request->busca;

        $eventos = Evento::where('nome', 'ilike', '%'.$busca.'%')
                            ->get();

        $estabelecimentos = Estabelecimento::where('nome', 'ilike', '%'.$busca.'%')
                            ->get();

        return view('ResultadoPesquisa')->with([
            'busca' => $busca,
            'eventos' => $eventos,
            'estabelecimentos' => $estabelecimentos]);
    }

    function pesquisarEvento($busca="") {
        $eventos = Evento::where('nome', 'ilike', '%'.$busca.'%')
                            ->get();

        return view('ResultadoPesquisaEventos')->with([
            'busca' => $busca,
            'eventos' => $eventos]);
    }

    function pesquisarEstabelecimento($busca="") {
        $estabelecimentos = Estabelecimento::where('nome', 'ilike', '%'.$busca.'%')
                            ->get();

        return view('ResultadoPesquisaEstabelecimentos')->with([
            'busca' => $busca,
            'estabelecimentos' => $estabelecimentos]);
    }
}
