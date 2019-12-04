<?php

namespace App\Http\Controllers;

use App\Atracao;
use App\Evento;
use Illuminate\Http\Request;

class AtracaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atracoes = Atracao::all();
        return view('ListarAtracoes', compact(['atracoes']));
    }

    /**
     * Display a listing of the resource by user.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByUser()
    {
        $atracoes = Atracao::all();
        return view('ListarAtracoes', compact(['atracoes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        return view("cadastrarAtracao");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $request->validate(Atracao::$rules, Atracao::$messages);
        $atracao = new Atracao();
        $atracao->nome = $request->nome;
        $atracao->descricao = $request->descricao;
        $atracao->save();
        return redirect()->route("atracao.cadastrar");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idEvento)
    {
        $evento = Evento::find($idEvento);

        $atracoes = $evento->getAtracoes();

        return view('listarAtracoesCadastrados', ['atracoes' => $atracoes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
