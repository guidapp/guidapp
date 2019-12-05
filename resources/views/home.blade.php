@extends('layouts.app')

@push('scripts')
    <script src="js/home.js"></script>
    <script>
    window.onload = function() {
        selecionarEvento({!! $eventos[0] !!});
    };
    </script>
@endpush

@section('content')
<div class="container">
    @if (session('status'))
        <div class="row">
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-4" style="padding:1%;">
            <div class="card text-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="eventos-tab" data-toggle="tab" href="#eventos" role="tab" aria-controls="eventos" aria-selected="true">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#estabelecimentos" role="tab" aria-controls="estabelecimentos" aria-selected="false">Estabelecimentos</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
                        @if(count($eventos) == 0)
                        <div class="alert alert-danger">
                                Não há nenhum estabelecimento seu cadastrado no sistema.
                        </div>
                        @else
                            <div class="col-sm">
                                @foreach ($eventos as $evento)
                                <div class="card" style="margin:2%" onclick="selecionarEvento({{$evento}})">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            @if (count($evento->imagems) > 0)
                                                <img src="{{ asset($evento->imagems[0]->nome) }}" class="imagem-menor">
                                            @else
                                                <img src="{{ asset('images/sem-imagem.jpg') }}" class="imagem-menor">
                                            @endif
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            <p class="texto-listagem" style="font-weight:bold">{{ $evento->nome }}</p>
                                            <p class="texto-listagem">{{ $evento->data }}</p>
                                            <p class="texto-listagem">{{ $evento->horario }}</p>
                                            <p class="texto-listagem">{{ $evento->visitas }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="estabelecimentos" role="tabpanel" aria-labelledby="estabelecimentos-tab">
                        @if(count($estabelecimentos) == 0)
                        <div class="alert alert-danger">
                                Não há nenhum estabelecimento seu cadastrado no sistema.
                        </div>
                        @else
                            <div class="col-sm">
                                @foreach ($estabelecimentos as $estabelecimento)
                                <div class="card" style="margin:2%" onclick="selecionarEstabelecimento({{$estabelecimento}})">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            @if (count($estabelecimento->imagems) > 0)
                                                <img src="{{ asset($estabelecimento->imagems[0]->nome) }}" class="imagem-menor">
                                            @else
                                                <img src="{{ asset('images/sem-imagem.jpg') }}" class="imagem-menor">
                                            @endif
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            <p class="texto-listagem" style="font-weight:bold">{{ $estabelecimento->nome }}</p>
                                            <p class="texto-listagem">{{ $estabelecimento->cidade }}</p>
                                            <p class="texto-listagem">Hora</p>
                                            <p class="texto-listagem">{{ $estabelecimento->visitas }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </div>

        <div class="col-sm-8" style="padding:1%;">
            <div class="row" style="padding:1%;">
                <div class="col-sm-10">
                    <img id="imagemDestaque" src="{{ asset('images/sem-imagem.jpg') }}" class="imagem-maior">
                </div>
                <div id="listaImagens" class="col-sm-2 text-left">
                </div>
            </div>

            <div class="row" style="padding:1%;">
                <div class="col-sm text-left">
                    <p id="nome_evento"></p>
                    <p id="tags_evento"></p>
                    <p id="local_evento" style="display: inline;"></p>
                    &nbsp
                    <p id="datahora_evento" style="display: inline;"></p>
                </div>
            </div>

            <div class="row" style="padding: 1%;">
                <div class="col-sm text-center" style="padding: 0px;">
                    <p id="botao-visualizacoes" class="acoes-home" style="background-color: lightgray;"></p>
                    <p id="botao-compartilhar" class="acoes-home" style="background-color: mediumpurple;">Compartilhar</p>
                </div>

                <div class="col-sm text-center" style="padding: 0px;">
                    <p id="botao-curtir" class="acoes-home" style="background-color: pink;">Interesse</p>
                    <p id="botao-ingressos" class="acoes-home" style="background-color: lawngreen;">Comprar ingressos</p>
                </div>
            </div>

            <div class="row" style="padding:1%;">
                <div class="col-sm text-left">
                    <p id="titulo-descricao" class="titulo">Descrição do Evento</p>
                    <p id="descricao"></p>
                </div>
            </div>

            <div id="ingressos" class="row" style="padding:1%;">
                <div class="col-sm text-left">
                    <div class="card" >
                        <div class="card-header titulo-card">
                            <div>Ingresso</div>
                            <div>R$ <a id="valor-total-ingressos"></a></div>
                        </div>
                        <div id="lista-ingressos">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
