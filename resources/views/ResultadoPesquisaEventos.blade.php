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
                                @foreach($eventos as $item)
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
