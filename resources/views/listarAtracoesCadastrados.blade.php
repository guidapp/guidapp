@extends('layouts.app')
@section('content')
<div class="container">
      <div style="width:100%;">
        <div class="card">
          <div class="card-header">Lista de Atrações</div>
          <div class="card-body">
            <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Local</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>
            <?php $idTemp =-1; ?>
            @foreach($atracoes as $item)
              <?php $idTemp++; ?>
              <tbody>
                <tr>
                  <th scope="row">{{$idTemp+1}}</th>
                  <td>{{$item->nome}}</td>
                  <td>
                    @if(isset($item->eventoUnico[0]))
                      {{ $item->eventoUnico[0]->data }}
                    @else
                      <a>--</a>
                    @endif
                  </td>
                  <td>
                    <a  href="{{ route('evento.visualizar', [$item->id]) }}" class="btn btn-primary btn-sm" style="color:white">Ver Detalhes</a>
                    <a  href="{{ route('atracao.show', [$item->id]) }}" class="btn btn-primary btn-sm" style="color:white">Ver Atrações</a>
                    @can('editarEvento', $item)
                      <a  href="{{ route('editar.cadastrar', ['idEvento' => $item])}}" class="btn btn-primary btn-sm" style="margin-left:50px;">Editar</a>
                      <a  href="{{ route('deletar.cadastrar', ['idEvento' => $item])}}" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                    @endcan
                  </td>
              </tbody>
            @endforeach
            </table>

            <a href="{{url()->previous()}}" class="btn btn-primary" style="margin: 20px">Voltar</a>
            <a class="btn btn-success" href="{{ route('atracao.cadastrar') }}">Criar Atrações</a>
        </div>
        </div>
    </div>
</div>
@endsection
