@extends('layouts.app')
@section('content')
<div class="container">
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
                    @can('editarPrato', $item)
                      <a  href="" class="btn btn-primary btn-sm">Editar</a>
                      <a  href="" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                    @else
                      <a  href="" class="btn btn-primary btn-sm" style="color:white">Ver detalhes</a>
                    @endcan
                  </td>
              </tbody>
            @endforeach
            </table>
            @can('editarEstabelecimento', $estabelecimento)
              <a href="{{ route('prato.cadastrar', [$estabelecimento->id]) }}" class="btn btn-success" href="">Criar Evento</a>
            @endcan
        </div>
        </div>
    </div>
</div>
@endsection
