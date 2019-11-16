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
                <th scope="col">Status</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Nome do estabelecimento 1</td>
                <td>Nº de Visitas/mensagens</td>
                <td>
                  <button type="button" class="btn btn-primary">Abrir</button>
                  <button type="button" class="btn btn-secondary">Editar</button>
                  <button type="button" class="btn btn-danger">Deletar</button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Nome do estabelecimento 2</td>
                <td>Nº de Visitas/mensagens</td>
                <td>
                  <button type="button" class="btn btn-primary">Abrir</button>
                  <button type="button" class="btn btn-secondary">Editar</button>
                  <button type="button" class="btn btn-danger">Deletar</button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Nome do estabelecimento 3</td>
                <td>Nº de Visitas/mensagens</td>
                <td>
                  <button type="button" class="btn btn-primary">Abrir</button>
                  <button type="button" class="btn btn-secondary">Editar</button>
                  <button type="button" class="btn btn-danger">Deletar</button>
                </td>
              </tr>
            </tbody>
            </table>
            <a class="btn btn-success" href="{{ route('estabelecimentos.cadastrados') }}">Criar Estabelecimento</a>
        </div>
        </div>
    </div>
</div>
@endsection
