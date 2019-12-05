<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atracao;
use App\Evento;
use App\Repositories\ImageRepository;

class AtracaoController extends Controller
{
    function indexByEvento($idEvento) {
        $evento = Evento::find($idEvento);
        $atracaos = $evento->atracaos;

        return view('listaAtracoes')->with(['atracaos' => $atracaos, 'evento' => $evento]);
    }

    function prepararCadastro($idEvento) {
        $evento = Evento::find($idEvento);

        return view('cadastrarAtracao')->with(['evento' => $evento]);
    }

    function cadastro(Request $request, $idEvento) {
        $request->validate(Atracao::$rules, Atracao::$messages);

        $atracao = new Atracao($request->all());
        $atracao->evento_id = $idEvento;
        
        $atracao->save();

		if(isset($request->imagem)) {
			$repositorio = new ImageRepository();
			$nomeImagem = $repositorio->saveImage($request['imagem'], 'atracao', $atracao->id, 250);
			if($nomeImagem != '') {
				$atracao->addImagem($nomeImagem);
			}
		}
        
        return redirect()->route('evento.atracoes.listar', [$idEvento])->withSuccess('Atração cadastrada com sucesso.');
    }

    function prapararAtualizacao($idAtracao) {
        $atracao = Atracao::find($idAtracao);

        return view('cadastrarAtracao')->with([
            'atracao' => $atracao, 
            'evento' => $atracao->evento]);
    }

    function atualizar(Request $request, $idAtracao) {
        $request->validate(Atracao::$rules, Atracao::$messages);
        
        $atracao = Atracao::find($idAtracao);

        if(!isset($atracao))
            return redirect('listar.eventos.cadastrados')->withError('Atração não encontrada');

        $atracao->fill($request->all());
        $atracao->save();

		if(isset($request->imagem)) {
			$repositorio = new ImageRepository();
			$nomeImagem = $repositorio->saveImage($request['imagem'], 'atracao', $atracao->id, 250);
			if($nomeImagem != '') {
				$atracao->updateImagem($nomeImagem);
			}
		}

        return redirect()->route('evento.atracoes.listar', [$atracao->evento->id])->withSuccess('Atração atualizada com sucesso.');
    }

    function remover($idAtracao) {
        $atracao = Atracao::find($idAtracao);

        if(!isset($atracao))
            return redirect('listar.eventos.cadastrados')->withError('Atração não encontrada');
        
        $evento = $atracao->evento;

        $atracao->delete();

        return redirect()->route('evento.atracoes.listar', [$atracao->evento->id])->withSuccess('Atração removida com sucesso.');
    }

    function visualizar($id) {
        $atracao = Atracao::find($id);

        return view('visualizarAtracao')->with('atracao', $atracao);
    }
}
