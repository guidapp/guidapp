@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            <a>{{session('success')}}</a>
        </div>
    @endif

    <div style="width:100%;">
        <div class="card">
            <div class="card-header">Lista de atracaos do evento {{ $evento->nome }}</div>
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Atração</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>

                    <?php $idTemp =-1; ?>
                    @foreach ($atracaos as $item)
                    <?php $idTemp++; ?>
                        <tbody>
                            <tr>
                            <th scope="row">{{$idTemp+1}}</th>
                            <td>{{$item->nome}}</td>
                            <td>{{$item->horario}}</td>
                            <td>
                                <a  href="{{ route('atracao.visualizar', [$item->id]) }}" class="btn btn-primary btn-sm" style="color:white">Ver detalhes</a>
                                @can('editarAtracao', $item)
                                    <a  href="{{ route('atracao.atualizar', [$item->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <a  href="{{ route('atracao.remover', [$item->id]) }}" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                                @endcan
                            </td>
                        </tbody>
                    @endforeach
                </table>

                <?php $route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() ?>

                @if($route == 'atracao.cadastrar')
                <a href="{{ route('listar.eventos.cadastrados') }}" class="btn btn-primary" style="margin: 20px">Meus Eventos</a>
                @else
                <a href="{{url()->previous()}}" class="btn btn-primary" style="margin: 20px">Voltar</a>
                @endif

                @can('editarEvento', $evento)
                    <a href="{{ route('atracao.cadastrar', [$evento->id]) }}" class="btn btn-success" href="">Criar Atração</a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
