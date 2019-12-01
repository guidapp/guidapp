<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastrarEstabelecimentoController extends Controller
{
    public function cadastrarEstabelecimentoSalvar (Request $request){
		// dd($request->imagem);

		$nomeImagem = '';
		if(isset($request->imagem)) {
			$repositorio = new ImageRepository();
			$nomeImagem = $repositorio->saveImage($request['imagem'], 'estabelecimento', 1, 250);
			if($nomeImagem == '') {
				abort(400);
			}
		}

		//enviar para o banco
		$estabelecimento = new \App\Estabelecimento();
		$estabelecimento->nome = $request->nome_estabelecimento;
		$estabelecimento->descricao = $request->descricao;
		// $estabelecimento->tags = $request->tags;				//tags para o estabelecimento
		 $estabelecimento->user_id = Auth::user()->id;
		// $estabelecimento->quantidade
		// $estabelecimento->QuickHashIntSet
		$estabelecimento->save();

		if(isset($request->imagem)) {
			$estabelecimento->addImagem($nomeImagem);
		}

		// //enviar para o banco
		// $estabelecimento = new \App\Estabelecimento();
		// $estabelecimento->nome = $request->nome_evento;
		// $estabelecimento->descricao = $request->descricao;
		// // $estabelecimento->tags = $request->tags;
		// $estabelecimento->avaliacao = '1';
		// $estabelecimento->visitas = '1';	/
		// //$estabelecimento->quantidade = $request->quantidade;
		// $estabelecimento->hash = '16513';
		//
		// $user = Auth::user();
		//
		// $estabelecimento->user_id = $user->id;
		//
		// $estabelecimento->estabelecimento_id = '1'; //verificar se e um estabelecimento ou estabelecimento independente
		//
		// $estabelecimento->save();

		return redirect()->route('atracao.cadastrar');
	}
}
