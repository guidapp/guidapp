<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prato;
use App\Estabelecimento;

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
}
