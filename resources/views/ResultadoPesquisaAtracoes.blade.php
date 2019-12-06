@extends('layouts.app')
@section('content')
<div class="container">
    
<div class="row" style="margin-top: 3%">
        <div class="col-sm-12">
            <a href="{{ route('pesquisa', $busca) }}" class="btn btn-success" style="margin: 10px">Voltar</a>
            
            <div class="card">
                <div class="card-header">Atrações</div>
                <div class="card-body">
                    @if ($atracoes->count() == 0)
                        Não foram encontrados resultados para "{{ $busca }}"
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Atração</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $idTemp =-1; ?>
                                @foreach($atracoes as $item)
                                    <?php $idTemp++; ?>
                                    <tr>
                                        <th scope="row">{{$idTemp+1}}</th>
                                        <td>{{$item->nome}}</td>
                                        <td>{{$item->evento->data}} às {{$item->horario}}</td>
                                        <td>
                                            <a  href="{{ route('atracao.visualizar', [$item->id]) }}" class="btn btn-primary btn-sm" style="color:white">Ver detalhes</a>
                                            @can('editarAtracao', $item)
                                                <a  href="{{ route('atracao.atualizar', [$item->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                                                <a  href="{{ route('atracao.remover', [$item->id]) }}" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            
            <a href="{{ route('pesquisa', $busca) }}" class="btn btn-success" style="margin: 10px">Voltar</a>
        </div>
    </div>
</div>
@endsection
