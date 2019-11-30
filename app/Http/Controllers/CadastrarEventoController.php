<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Evento;


class CadastrarEventoController extends Controller
{
	// $idTempEventoSelecionado = 0;

	public function cadastrarEvento(Request $request) {
	        //$evento = Ingresso::find($id);

		$estabelecimentos = \App\Estabelecimento::all();
	    return view('cadastrarEventos')->with(['estabelecimentos' => $estabelecimentos]);
	}

	public function cadastrarEventoSalvar (Request $request){
		// dd($request);

		//enviar para o banco
		$evento = new \App\Evento();
		$evento->nome = $request->nome_evento;
		$evento->descricao = $request->descricao;
		// $evento->tags = $request->tags;				//tags para o evento
		 $evento->visitas = 1;										//valor aleatorio
		 $evento->hash = '16513';									//valor aleatorio
		 $evento->estabelecimento_id = '1'; 			//valor aleatorio
		 $evento->avaliacao = 1;									//valor aleatorio
		 $evento->user_id = Auth::user()->id;
		// $evento->quantidade
		// $evento->QuickHashIntSet
		$evento->save();


		// //enviar para o banco
		// $evento = new \App\Evento();
		// $evento->nome = $request->nome_evento;
		// $evento->descricao = $request->descricao;
		// // $evento->tags = $request->tags;
		// $evento->avaliacao = '1';
		// $evento->visitas = '1';	/
		// //$evento->quantidade = $request->quantidade;
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

	/*
	*	FUNCAO: listar todos os eventos cadastrados
	* TIPO: GET
	*	VIEW: listarEventosCadastrados
	*/
	public function listarEvento(){
		$eventos = \App\Evento::where('user_id', Auth::user()->id)->get();
		return view('listarEventosCadastrados', ['eventos' => $eventos]);
	}

	/*
	*	FUNCAO: funcao que retorna para a tela todos as informacoes a respeito do evento selecionado
	*	TIPO: GET
	*	VIEW: cadastrarEventos
	*/
	public function editarEvento(Request $request){
		$temp = $request->idEvento;
		$resultado = Evento::where('id',$request->idEvento)->where('user_id',Auth::user()->id)->first();
		return view('cadastrarEventos', ['eventos' => $resultado, 'idEvento' => $request->idEvento]);
	}

	/*
	*	FUNCAO: funcao atualizar evento
	* TIPO: GET
	* VIEW: cadastrarEventos
	*/
	public function atualizarEvento(Request $request){
		$resultado = Evento::where('id',$request->idEvento)->where('user_id',Auth::user()->id)->update(['nome' => $request->nome_evento,'descricao' => $request->descricao]);
		return redirect()->route('listar.eventos.cadastrados');
	}

	/*
	*	FUNCAO: funcao deletar evento
	* TIPO: GET
	* VIEW: cadastrarEventos
	*/
	public function deletarEvento(Request $request){
		$resultado = Evento::where('id',$request->idEvento)->where('user_id',Auth::user()->id)->delete();
		return redirect()->route('listar.eventos.cadastrados');
	}
}
