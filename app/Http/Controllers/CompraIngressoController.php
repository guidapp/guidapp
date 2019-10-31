<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ingresso;
use App\Pagamento;

class CompraIngressoController extends Controller
{
    public function prepararCompra($id) {
        $ingresso = Ingresso::find($id);

        return view('compraIngresso')->with(['ingresso' => $ingresso]);
    }

    public function comprar(Request $request) {
        $ingresso = Ingresso::find($request['ingresso_id']);

        $user = Auth::user();

        $ingressosVendidos = $ingresso->criarVenda($user, $request['quantidade']);

        $pagamento = new Pagamento;
        $pagamento->usuario->associate($user);
        $pagamento->vendaIngressos->attach($ingressosVendidos);

        return $ingresso->preco;
    }
}
