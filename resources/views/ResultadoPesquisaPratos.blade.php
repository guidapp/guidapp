@extends('layouts.app')
@section('content')
<div class="container">
    
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
                                @foreach($pratos as $item)
                                    <?php $idTemp++; ?>
                                    <tr>
                                        <th scope="row">{{$idTemp+1}}</th>
                                        <td>{{$item->nome}}</td>
                                        <td>R$ {{$item->preco}}</td>
                                        <td>
                                            <a  href="{{ route('prato.visualizar', [$item->id]) }}" class="btn btn-primary btn-sm" style="color:white">Ver detalhes</a>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
