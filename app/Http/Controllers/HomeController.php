<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estabelecimento;
use App\Evento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $estabelecimentos = Estabelecimento::all();
        $eventos = Evento::with(['tags', 'imagems', 'ingressos'])->get();

        return view('home')->with([
            'estabelecimentos' => $estabelecimentos,
            'eventos' => $eventos
        ]);
    }
}
