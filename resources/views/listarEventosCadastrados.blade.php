@extends('layouts.app')
@section('content')
<div class="container">
      <div style="width:100%;">
        <div class="card">
          <div class="card-header">Lista de Eventos</div>
          <div class="card-body">
            <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Eventos</th>
                <th scope="col">Data</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>
            <?php $idTemp =-1; ?>
            @foreach($eventos as $item)
              <?php $idTemp++; ?>
              <tbody>
                <tr>
                  <th scope="row">{{$idTemp+1}}</th>
                  <td>{{$item->nome}}</td>
                  <td>{{'sei_la'}}</td>
                  <td>
                    <a  href="{{ route('evento.visualizar', [$item->id]) }}" class="btn btn-info btn-sm" style="color:white">Detalhes</a>
                    <a   class="btn btn-primary btn-sm" style="color:white">Atrações</a>

                    @can('editarEvento', $item)
                      <a  href="{{ route('editar.cadastrar', ['idEvento' => $item])}}" class="btn btn-secondary btn-sm" style="margin-left:50%;">Editar</a>
                      <a  href="{{ route('deletar.cadastrar', ['idEvento' => $item])}}" class="btn btn-danger btn-sm" style="color:white;">Deletar</a>
                    @endcan
                  </td>
              </tbody>
            @endforeach
            </table>

            <a href="{{url()->previous()}}" class="btn btn-primary" style="margin: 20px">Voltar</a>

            @if(isset($estabelecimento))
              @can('editarEstabelecimento', $estabelecimento)
                <a class="btn btn-success" href="{{ route('evento.cadastrar', [$estabelecimento->id]) }}">Criar Evento</a>
              @endcan
            @else
              <a class="btn btn-success" href="{{ route('evento.cadastrar') }}">Criar Evento</a>
            @endif
        </div>
        </div>
    </div>
</div>
@endsection
