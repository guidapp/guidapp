@extends('layouts.app')
@section('content')
<div class="container">
      <div style="width:100%;">
        <div class="card">
          <div class="card-header">Lista de Estabelecimentos</div>
          <div class="card-body">
            <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Estabelecimentos</th>
                <th scope="col">Local</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>
            <tbody>
              <?php $idTemp =-1; ?>
              @foreach($estabelecimentos as $item)
                <?php $idTemp++; ?>
                <tbody>
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
                      <a  href="{{ route('estabelecimento.eventos.listar', [$item->id])}}" class="btn btn-secondary btn-sm" style="color:white">Eventos</a>
                      <a  href="{{ route('estabelecimento.pratos.listar', [$item->id])}}" class="btn btn-secondary btn-sm" style="color:white">Pratos</a>
                    </td>
                </tbody>
              @endforeach
            </tbody>
            </table>

            <?php $route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() ?>

            @if($route == 'estabelecimentos.cadastrados' || $route == 'estabelecimento.eventos.listar' || $route == 'estabelecimento.pratos.listar')
              <a href="{{ route('home') }}" class="btn btn-primary" style="margin: 20px">Página Inicial</a>
            @else
              <a href="{{url()->previous()}}" class="btn btn-primary" style="margin: 20px">Voltar</a>
            @endif

            <a class="btn btn-success" href="{{ route('estabelecimentos.cadastrados') }}">Criar Estabelecimento</a>
        </div>
        </div>
    </div>
</div>
@endsection
