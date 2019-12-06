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
      <div class="card-header">Lista de pratos do estabelecimento {{ $estabelecimento->nome }}</div>
      <div class="card-body">
        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Prato</th>
            <th scope="col">Preço</th>
            <th scope="col">Opções</th>
          </tr>
        </thead>
        <?php $idTemp =-1; ?>
        @foreach($pratos as $item)
          <?php $idTemp++; ?>
          <tbody>
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
          </tbody>
        @endforeach
        </table>

        <?php $route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() ?>

        @if($route == 'prato.cadastrar')
          <a href="{{ route('listar.estabelecimentos.cadastrados') }}" class="btn btn-primary" style="margin: 20px">Meus Estabelecimentos</a>
        @else
          <a href="{{url()->previous()}}" class="btn btn-primary" style="margin: 20px">Voltar</a>
        @endif
        
        @can('editarEstabelecimento', $estabelecimento)
          <a href="{{ route('prato.cadastrar', [$estabelecimento->id]) }}" class="btn btn-success" href="">Criar Prato</a>
        @endcan
    </div>
    </div>
  </div>
@endsection
