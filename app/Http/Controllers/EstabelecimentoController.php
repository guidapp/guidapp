<?php

namespace App\Http\Controllers;

use App\Estabelecimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstabelecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estabelecimentos = Estabelecimento::all();
        return view('ListarEstabelecimentos', compact(['estabelecimentos']));
    }

    /**
     * Display a listing of the resource own by a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByUser(){
        $user = Auth::user();
        if (isset($user)) {
            $estabelecimentos = Estabelecimento::where('user_id','=',$user->id)->get();
            return view('ListarEstabelecimentos', compact(['estabelecimentos']));
        }
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cadastrarEstabelecimento");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Estabelecimento::$rules, Estabelecimento::$messages);
        $estabelecimento = new Estabelecimento();
        $estabelecimento->nome = $request->nome;
        $estabelecimento->latitude = $request->latitude;
        $estabelecimento->longitude = $request->longitude;
        $estabelecimento->descricao = $request->descricao;
        $estabelecimento->telefone = $request->telefone;
        $estabelecimento->cidade = $request->cidade;
        $estabelecimento->user_id = Auth::user()->id;
        $estabelecimento->save();
        
        return redirect()->route("estabelecimento.listar.user");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estabelecimento = Estabelecimento::find($id);
        return view('MostrarEstabelecimento', compact(['estabelecimento']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estabelecimento = Estabelecimento::find($id);
        if (isset($estabelecimento)) {
            return view('EditarEstabelecimento', compact('estabelecimento'));
        }
        return redirect()->back()->with('warning','Estabelecimento não existe.');
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
        $request->validate(Estabelecimento::$rules, Estabelecimento::$messages);
        $estabelecimento = Estabelecimento::find($id);
        $estabelecimento->nome = $request->nome;
        $estabelecimento->latitude = $request->latitude;
        $estabelecimento->longitude = $request->longitude;
        $estabelecimento->descricao = $request->descricao;
        $estabelecimento->telefone = $request->telefone;
        $estabelecimento->cidade = $request->cidade;
        $estabelecimento->save();
        return redirect()->route('estabelecimento.listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estabelecimento = Estabelecimento::find($id);
        if (isset($estabelecimento)) {
            $estabelecimento->delete(); 
        }
        return redirect()->route('estabelecimento.listar');
    }
}
