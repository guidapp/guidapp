<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ImageRepository;

class CadastrarEstabelecimentoController extends Controller
{
    public function cadastrarEstabelecimentoSalvar (Request $request){
		// dd($request->imagem);

		//enviar para o banco
		$estabelecimento = new \App\Estabelecimento();
		$estabelecimento->nome = $request->nome_estabelecimento;
		$estabelecimento->descricao = $request->descricao;
		$estabelecimento->latitude = $request->latitude;
		$estabelecimento->longitude = $request->longitude;
		// $estabelecimento->tags = $request->tags;				//tags para o estabelecimento
		$estabelecimento->telefone = "0000-0000";
		$estabelecimento->cidade = "garanhuns";
		$estabelecimento->user_id = Auth::user()->id;
		// $estabelecimento->quantidade
		// $estabelecimento->QuickHashIntSet
		$estabelecimento->save();

		if(isset($request->imagem)) {
			$repositorio = new ImageRepository();
			$nomeImagem = $repositorio->saveImage($request['imagem'], 'estabelecimento', $estabelecimento->id, 250);
			if($nomeImagem != '') {
				$estabelecimento->updateImagem($nomeImagem);
			}
		}

		return redirect()->route('atracao.cadastrar');
	}
}