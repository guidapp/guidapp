<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;


class CadastrarEventoController extends Controller
{

	public function cadastrarEvento(Request $request) {
	        //$evento = Ingresso::find($id);

		$estabelecimentos = \App\Estabelecimento::all();
	    return view('cadastrarEventos')->with(['estabelecimentos' => $estabelecimentos]);
	}

	public function cadastrareventosalvar (Request $request){
		// //enviar para o banco
		// $evento = new \App\Evento();
		// $evento->nome = $request->nome_evento;
		// $evento->descricao = $request->descricao;
		// // $evento->tags = $request->tags; //acho que deveria passar as tags por aqui
		// $evento->avaliacao = '1';	//não entendi o motivo pelo qual a avaliação entra aqui
		// $evento->visitas = '1';	//não entendi o motivo de ter visita aqui
		// //$evento->quantidade = $request->quantidade; //quantidade???
		// $evento->hash = '16513';
		//
		// $user = Auth::user();
		//
		// $evento->user_id = $user->id;
		//
		// $evento->estabelecimento_id = '1'; //verificar se e um estabelecimento ou evento independente
		//
		// $evento->save();

		return redirect()->route('atracao.cadastrar');
	}
}
