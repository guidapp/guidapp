<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prato;
use App\Estabelecimento;
use App\Repositories\ImageRepository;

class PratoController extends Controller
{
    function indexByEstabelecimento($id) {
        $estabelecimento = Estabelecimento::find($id);
        $pratos = $estabelecimento->pratos;

        return view('listaPratos')->with(['pratos' => $pratos, 'estabelecimento' => $estabelecimento]);
    }

    function prepararCadastro($idEstabelecimento) {
        $estabelecimento = Estabelecimento::find($idEstabelecimento);

        return view('cadastrarPratos')->with(['estabelecimento' => $estabelecimento]);
    }

    function cadastro(Request $request, $idEstabelecimento) {
        $request->validate(Prato::$rules, Prato::$messages);

        $prato = new Prato($request->all());
        $prato->estabelecimento_id = $idEstabelecimento;
        $prato->save();

		if(isset($request->imagem)) {
			$repositorio = new ImageRepository();
			$nomeImagem = $repositorio->saveImage($request['imagem'], 'prato', $prato->id, 250);
			if($nomeImagem != '') {
				$prato->addImagem($nomeImagem);
			}
		}
        
        return redirect()->route('estabelecimento.pratos.listar', [$idEstabelecimento])->withSuccess('Prato cadastrado com sucesso.');
    }

    function prapararAtualizacao($idPrato) {
        $prato = Prato::find($idPrato);

        return view('cadastrarPratos')->with([
            'prato' => $prato, 
            'estabelecimento' => $prato->estabelecimento]);
    }

    function atualizar(Request $request, $idPrato) {
        $request->validate(Prato::$rules, Prato::$messages);
        
        $prato = Prato::find($idPrato);

        if(!isset($prato))
            return redirect('listar.estabelecimentos.cadastrados')->withError('Prato não encontrado');

        $prato->fill($request->all());
        $prato->save();

		if(isset($request->imagem)) {
			$repositorio = new ImageRepository();
			$nomeImagem = $repositorio->saveImage($request['imagem'], 'prato', $prato->id, 250);
			if($nomeImagem != '') {
				$prato->updateImagem($nomeImagem);
			}
		}

        return redirect()->route('estabelecimento.pratos.listar', [$prato->estabelecimento->id])->withSuccess('Prato atualizado com sucesso.');
    }

    function remover($idPrato) {
        $prato = Prato::find($idPrato);

        if(!isset($prato))
            return redirect('listar.estabelecimentos.cadastrados')->withError('Prato não encontrado');
        
        $estabelecimento = $prato->estabelecimento;

        $prato->delete();

        return redirect()->route('estabelecimento.pratos.listar', [$prato->estabelecimento->id])->withSuccess('Prato removido com sucesso.');
    }

    function visualizar($idPrato) {
        $prato = Prato::find($idPrato);

        if(!isset($prato))
            return redirect('listar.estabelecimentos.cadastrados')->withError('Prato não encontrado');
        
        return view("visualizarPrato")->with('prato', $prato);
    }
}
