@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Eventos</div>
                <div class="card-body">
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
                                        @can('editarEvento', $item)
                                            <a  href="{{ route('editar.cadastrar', ['idEvento' => $item]) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <a  href="{{ route('deletar.cadastrar', ['idEvento' => $item]) }}" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                                        @else
                                            <a  href="" class="btn btn-primary btn-sm" style="color:white">Ver detalhes</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
      tchau
    </div>
</div>
@endsection
