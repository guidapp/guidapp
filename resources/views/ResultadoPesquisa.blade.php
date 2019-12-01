@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Eventos</div>
                <div class="card-body">
                    @if ($eventos->count() == 0)
                        Não foram encontrados resultados para "{{ $busca }}"
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Evento</th>
                                <th scope="col">Data</th>
                                <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $idTemp =-1; ?>
                                @foreach($eventos->slice(0,7) as $item)
                                    <?php $idTemp++; ?>
                                    <tr>
                                        <th scope="row">{{$idTemp+1}}</th>
                                        <td>{{$item->nome}}</td>
                                        <td>{{'sei_la'}}</td>
                                        <td>
                                            <a  href="{{ route('evento.visualizar', [$item->id]) }}" class="btn btn-primary btn-sm" style="color:white">Detalhes</a>
                                            @can('editarEvento', $item)
                                                <a  href="{{ route('editar.cadastrar', ['idEvento' => $item]) }}" class="btn btn-primary btn-sm">Editar</a>
                                                <a  href="{{ route('deletar.cadastrar', ['idEvento' => $item]) }}" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if($eventos->count() > 7)
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="{{ route('pesquisa.evento', [$busca]) }}" class="btn btn-success">Ver mais</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 3%">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Estabelecimentos</div>
                <div class="card-body">
                    @if ($estabelecimentos->count() == 0)
                        Não foram encontrados resultados para "{{ $busca }}"
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Estabelecimento</th>
                                <th scope="col">Local</th>
                                <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $idTemp =-1; ?>
                                @foreach($estabelecimentos->slice(0,7) as $item)
                                    <?php $idTemp++; ?>
                                    <tr>
                                        <th scope="row">{{$idTemp+1}}</th>
                                        <td>{{$item->nome}}</td>
                                        <td>{{$item->cidade}}</td>
                                        <td>
                                            <a  href="{{ route('estabelecimento.visualizar', [$item->id]) }}" class="btn btn-primary btn-sm" style="color:white">Detalhes</a>
                                            @can('editarEstabelecimento', $item)
                                                <a  href="{{ route('estabelecimento.editar', [$item->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                                                <a  href="{{ route('estabelecimento.remover', [$item->id]) }}" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                                            @endcan
                                            <a  href="{{ route('estabelecimento.pratos.listar', [$item->id])}}" class="btn btn-secondary btn-sm" style="color:white">Pratos</a>
                                            <a  href="{{ route('estabelecimento.eventos.listar', [$item->id])}}" class="btn btn-secondary btn-sm" style="color:white">Eventos</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if($estabelecimentos->count() > 7)
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="{{ route('pesquisa.estabelecimento', [$busca]) }}" class="btn btn-success">Ver mais</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 3%">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Pratos</div>
                <div class="card-body">
                    @if ($pratos->count() == 0)
                        Não foram encontrados resultados para "{{ $busca }}"
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prato</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $idTemp =-1; ?>
                                @foreach($pratos->slice(0,7) as $item)
                                    <?php $idTemp++; ?>
                                    <tr>
                                        <th scope="row">{{$idTemp+1}}</th>
                                        <td>{{$item->nome}}</td>
                                        <td>R$ {{$item->preco}}</td>
                                        <td>
                                            <a  href="{{ route('prato.visualizar', [$item->id]) }}" class="btn btn-primary btn-sm" style="color:white">Detalhes</a>
                                            @can('editarPrato', $item)
                                            <a  href="{{ route('prato.atualizar', [$item->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <a  href="{{ route('prato.remover', [$item->id]) }}" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if($pratos->count() > 7)
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="{{ route('pesquisa.prato', [$busca]) }}" class="btn btn-success">Ver mais</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
