@extends('layouts.app')
@section('content')
<div class="container">
    
    <div class="row">
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
                                @foreach($estabelecimentos as $item)
                                    <?php $idTemp++; ?>
                                    <tr>
                                        <th scope="row">{{$idTemp+1}}</th>
                                        <td>{{$item->nome}}</td>
                                        <td>{{$item->cidade}}</td>
                                        <td>
                                            @can('editarEstabelecimento', $item)
                                                <a  href="{{ route('estabelecimento.pratos.listar', [$item->id])}}" class="btn btn-secondary btn-sm" style="color:white">Pratos</a>
                                                <a  href="{{ route('estabelecimento.editar', [$item->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                                                <a  href="{{ route('estabelecimento.remover', [$item->id]) }}" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                                            @else
                                                <a  href="" class="btn btn-primary btn-sm" style="color:white">Ver detalhes</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
