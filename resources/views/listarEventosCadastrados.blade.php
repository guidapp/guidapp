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
                    <a  class="btn btn-secondary btn-sm" style="color:white">Atrações</a>
                    <a  href="{{ route('editar.cadastrar', ['idEvento' => $item])}}" class="btn btn-primary btn-sm">Editar</a>
                    <a  href="{{ route('deletar.cadastrar', ['idEvento' => $item])}}" class="btn btn-danger btn-sm" style="color:white">Deletar</a>
                  </td>
              </tbody>
            @endforeach
            </table>
            <a class="btn btn-success" href="{{ route('evento.cadastrar') }}">Criar Evento</a>
        </div>
        </div>
    </div>
</div>
@endsection
