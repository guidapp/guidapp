<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Ingresso;
use App\Pagamento;
use Illuminate\Support\Facades\Auth;

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

        if($ingressosVendidos == NULL) {
            return 'Ingressos esgotados';
        }

        $pagamento = Pagamento::gerarPagamento($user, $ingressosVendidos);

        Session::put('pagamento_id', $pagamento->id);

        return redirect()->route('paypal.ingresso');
    }

    public function confirmarPagamento(Request $request) {
        $pagamento_id = Session::get('pagamento_id');
        $id_pag_paypal = Session::get('id_pag_paypal');

        Session::forget('pagamento_id');
        Session::forget('id_pag_paypal');

        $pagamento = Pagamento::find($pagamento_id);

        $pagamento->confirmarPagamento($id_pag_paypal);

        return 'Compra efetuada com sucesso!';
    }

    public function listagemIngressosPagos() {
        $user = Auth::user();

        $ingressos = $user->compraIngressos;

        return view('ingressosComprados')->with(['ingressos' => $ingressos]);
    }
}
