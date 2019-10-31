<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ingresso;

class CompraIngressoController extends Controller
{
    public function prepararCompra($id) {
        $ingresso = Ingresso::find($id);

        return view('compraIngresso')->with(['ingresso' => $ingresso]);
    }

    public function comprar(Request $request) {
        return $request->quantidade;
    }
}
