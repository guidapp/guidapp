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
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Nome do evento 1</td>
                <td>Data 1</td>
                <td>
                  <button type="button" class="btn btn-primary">Abrir</button>
                  <button type="button" class="btn btn-secondary">Editar</button>
                  <button type="button" class="btn btn-danger">Deletar</button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Nome do evento 2</td>
                <td>Data 2</td>
                <td>
                  <button type="button" class="btn btn-primary">Abrir</button>
                  <button type="button" class="btn btn-secondary">Editar</button>
                  <button type="button" class="btn btn-danger">Deletar</button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Nome do evento 3</td>
                <td>Data 3</td>
                <td>
                  <button type="button" class="btn btn-primary">Abrir</button>
                  <button type="button" class="btn btn-secondary">Editar</button>
                  <button type="button" class="btn btn-danger">Deletar</button>
                </td>
              </tr>
            </tbody>
            </table>
            <a class="btn btn-success" href="{{ route('evento.cadastrar') }}">Criar Evento</a>
        </div>
        </div>
    </div>
</div>
@endsection
