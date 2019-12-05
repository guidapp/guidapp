@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Estabelecimento</div>
                <div class="row">
                    <div class="col-sm-6 text-left">
                        @if(isset($estabelecimento->imagems[0]))
                            <img id="image-preview" style="max-width: 500px;max-height: 300px;" src="/{{ $estabelecimento->imagems[0]->nome }}"></img>
                        @else
                            <img id="image-preview" style="max-width: 500px;max-height: 300px;" src="/images/sem-imagem.jpg"></img>
                        @endif
                    </div>
                
                    <div class="col-sm-6 text-left">
                        <div class="card-body">
                            <div class="p-2 bd-highlight">
                                <div>
                                    <label>Nome do Estabelecimento: {{ $estabelecimento->nome }}</label>
                                </div>

                                <div>
                                    <label>Endereço: {{ $estabelecimento->endereco }}</label>
                                </div>

                                <div>
                                    <label>Local: {{ $estabelecimento->cidade }}</label>
                                </div>

                                <div>
                                    <label>Telefone: {{ $estabelecimento->telefone }}</label>
                                </div>
                                
                                <div>
                                    <label>Tags: {{ $estabelecimento->tags }}</label>
                                </div>

                                <div>
                                    <label>Data e Hora: {{ $estabelecimento->horario }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm " style="padding:1%;">
                        <div class="card-body">
                            <label>Descrição: {{ $estabelecimento->descricao }}</label>
                        </div>
                    </div>
                </div>
            </div>

        <a href="{{url()->previous()}}" class="btn btn-primary" style="margin: 20px">Voltar</a>
        
        </div>
    </div>
</div>
@endsection
