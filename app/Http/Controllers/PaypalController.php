<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

// SIMULACAO DO FUNCIONAMENTO DO PAYPAL

class PaypalController extends Controller
{
    public function pagamentoIngresso(Request $request) {
        
        // codigo para pagamento via paypal

        // Session::put('pagamento_id', $request['pagamento_id']);
        Session::put('id_pag_paypal', 'id_pagamento_paypal');

        return redirect()->route('paypal.ingresso.status');
    }

    public function statusPagamentoIngresso() {
        $pagamento_id = Session::get('pagamento_id');
        $paypal_payment_id = Session::get('id_pag_paypal');

        // Session::forget('pagamento_id');
        // Session::forget('id_pag_paypal');

        return redirect()->route('ingressos.confirmacao');
    }
}
