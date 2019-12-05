<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Estabelecimento;
use App\Prato;
use App\Atracao;

class PesquisaController extends Controller
{
    function pesquisar(Request $request) {
        $busca = $request->busca;

        $eventos = Evento::where('nome', 'ilike', '%'.$busca.'%')
                            ->get();

        $estabelecimentos = Estabelecimento::where('nome', 'ilike', '%'.$busca.'%')
                            ->orWhere('cidade', 'ilike', '%'.$busca.'%')
                            ->get();

        $pratos = Prato::where('nome', 'ilike', '%'.$busca.'%')
                            ->get();

        $atracoes = Atracao::where('nome', 'ilike', '%'.$busca.'%')
                            ->get();

        return view('ResultadoPesquisa')->with([
            'busca' => $busca,
            'eventos' => $eventos,
            'pratos' => $pratos,
            'atracoes' => $atracoes,
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
                            ->orWhere('cidade', 'ilike', '%'.$busca.'%')
                            ->get();

        return view('ResultadoPesquisaEstabelecimentos')->with([
            'busca' => $busca,
            'estabelecimentos' => $estabelecimentos]);
    }

    function pesquisarPrato($busca="") {
        $pratos = Prato::where('nome', 'ilike', '%'.$busca.'%')
                            ->get();

        return view('ResultadoPesquisaPratos')->with([
            'busca' => $busca,
            'pratos' => $pratos]);
    }

    function pesquisarAtracao($busca="") {
        $atracoes = Atracao::where('nome', 'ilike', '%'.$busca.'%')
                            ->get();

        return view('ResultadoPesquisaAtracoes')->with([
            'busca' => $busca,
            'atracoes' => $atracoes]);
    }
}
