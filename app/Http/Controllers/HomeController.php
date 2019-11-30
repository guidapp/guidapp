<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estabelecimento;
use App\Evento;

class HomeController extends Controller
{
    public function index()
    {
        $estabelecimentos = Estabelecimento::with(['tags', 'imagems'])->get();
        $eventos = Evento::with(['tags', 'imagems', 'ingressos'])->get();

        return view('home')->with([
            'estabelecimentos' => $estabelecimentos,
            'eventos' => $eventos
        ]);
    }
}
