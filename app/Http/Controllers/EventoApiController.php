<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atracao;

class EventoApiController extends Controller
{
    public function index() {
        $eventos = Atracao::with('evento_unico.evento')->get();
        return response()->json($eventos);
    }
}
