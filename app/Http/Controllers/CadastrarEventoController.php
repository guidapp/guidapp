<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Evento;
use App\Estabelecimento;
use App\Repositories\ImageRepository;


class CadastrarEventoController extends Controller
{
	// $idTempEventoSelecionado = 0;

	public function cadastrarEvento(Request $request, $idEstabelecimento="") {
	        //$evento = Ingresso::find($id);

		// $estabelecimentos = \App\Estabelecimento::all();
	    return view('cadastrarEventos')->with(['idEstabelecimento' => $idEstabelecimento]);
	}

	public function cadastrarEventoSalvar (Request $request){
		// dd($request->id_estabelecimento == "");

		//enviar para o banco
		$evento = new \App\Evento();
		$evento->nome = $request->nome_evento;
		$evento->descricao = $request->descricao;
		// $evento->tags = $request->tags;				//tags para o evento
		$evento->visitas = 0;										//valor aleatorio
		$evento->hash = '16513';									//valor aleatorio
		$evento->avaliacao = 1;									//valor aleatorio
		$evento->user_id = Auth::user()->id;

		if($request->id_estabelecimento == "")
			$evento->estabelecimento_id = null;
		else
			$evento->estabelecimento_id = $request->id_estabelecimento;

		$evento->save();

		if(isset($request->imagem)) {
			$repositorio = new ImageRepository();
			$nomeImagem = $repositorio->saveImage($request['imagem'], 'evento', $evento->id, 250);
			if($nomeImagem != '') {
				$evento->updateImagem($nomeImagem);
			}
		}

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
		$resultado = Evento::where('id',$request->idEvento)->where('user_id',Auth::user()->id)->first();
		
		$resultado->update(['nome' => $request->nome_evento,'descricao' => $request->descricao]);

		if(isset($request->imagem)) {
			$repositorio = new ImageRepository();
			$nomeImagem = $repositorio->saveImage($request['imagem'], 'evento', $resultado->id, 250);
			if($nomeImagem != '') {
				$resultado->updateImagem($nomeImagem);
			}
		}

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

	public function visualizarEvento($id){
		$evento = \App\Evento::find($id);

		return view('visualizarEvento', ['evento' => $evento]);
	}

	public function indexByEstabelecimento($idEstabelecimento) {
		$estabelecimento = Estabelecimento::find($idEstabelecimento);

		if(!isset($estabelecimento)) {
			return redirect()->route('listar.eventos.cadastrados')->withError('Estabelecimento não encontrado');
		}

		$eventos = $estabelecimento->eventos;

		return view('listarEventosCadastrados')->with([
			'eventos' => $eventos,
			'estabelecimento' => $estabelecimento]);
	}
}
