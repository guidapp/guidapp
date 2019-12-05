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
		$estabelecimento->nome = $request->nome;
		$estabelecimento->descricao = $request->descricao;
		$estabelecimento->latitude = $request->latitude;
		$estabelecimento->longitude = $request->longitude;
		$estabelecimento->endereco = $request->endereco;
		$estabelecimento->tags = $request->tags;				//tags para o estabelecimento
		$estabelecimento->horario = $request->horario;
		$estabelecimento->telefone = $request->telefone;
		$estabelecimento->cidade = $request->cidade;
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

		return redirect()->route('listar.estabelecimentos.cadastrados');
	}

	/*
	*	FUNCAO: listar todos os estabelecimentos cadastrados
	* TIPO: GET
	*	VIEW: listarEstabelecimentosCadastrados
	*/
	public function listarEstabelecimento(){
		$estabelecimentos = \App\Estabelecimento::where('user_id', Auth::user()->id)->get();
		return view('listarEstabelecimentosCadastrados', ['estabelecimentos' => $estabelecimentos]);
	}

    function visualizarEstabelecimento($id) {
        $estabelecimento = \App\Estabelecimento::find($id);

        if(!isset($estabelecimento))
            return redirect('listar.estabelecimentos.cadastrados')->withError('Estabelecimento não encontrado');
        
        return view("visualizarEstabelecimento")->with('estabelecimento', $estabelecimento);
    }

}
