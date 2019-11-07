<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;


class CadastrarEventoController extends Controller
{

	public function cadastrarEvento() {

	        //$evento = Ingresso::find($id);

		$estabelecimentos = \App\Estabelecimento::all();
	    return view('cadastrarEventos')->with(['estabelecimentos' => $estabelecimentos]);
	}

	public function cadastrareventosalvar (Request $request){

		$evento = new \App\Evento();
		$evento->nome = $request->nome;
		$evento->descricao = $request->descricao;
		$evento->avaliacao = $request->avaliacao;
		$evento->visitas = $request->visitas;
		//$evento->quantidade = $request->quantidade;

		$evento->hash = '16513';

		$user = Auth::user();

		$evento->user_id = $user->id;

		$evento->estabelecimento_id = $request->estabelecimento_id;

		$evento->save();
	}
}