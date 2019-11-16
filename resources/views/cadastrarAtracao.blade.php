@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row" style="padding:1%;">
      <div style="width:100%; margin-bottom:3%;">
        <div class="card" >
          <form action="">
          <div class="card-header">Lista de Atrações Adicionadas</div>
          <div class="card-body">
            <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Atrações</th>
                <th scope="col">Data</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Nome atração 1</td>
                <td>Data da atração 1</td>
                <td>
                  <button type="button" class="btn btn-secondary">Editar</button>
                  <button type="button" class="btn btn-danger">Deletar</button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Nome atração 2</td>
                <td>Data da atração 2</td>
                <td>
                  <button type="button" class="btn btn-secondary">Editar</button>
                  <button type="button" class="btn btn-danger">Deletar</button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Nome atração 3</td>
                <td>Data da atração 3</td>
                <td>
                  <button type="button" class="btn btn-secondary">Editar</button>
                  <button type="button" class="btn btn-danger">Deletar</button>
                </td>
              </tr>
            </tbody>
            </table>
        </div>
        <div class="col-sm " style="padding:1%;">
            <div class="card-body">
            </div>
        </div>
        </form>
      </div>
    </div>
      <div style="width:100%;">
        <div class="card" >
          <form action="">
          <div class="card-header">Criar Atração</div>
          <div class="row">
            <div class="card-body">
                <div class="card-body">Area das imagens(da Atração)</div>
            </div>
            <div class="card-body">
              <div class="card-body">
                <div class="p-2 bd-highlight">
                  <div>
                      <label>Nome da Atração<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nome_atração" aria-label="Default" placeholder="Digite o nome da atração. ex.: Roberto Carlos, Maria Rita">
                    </div>
                  </div>
                  <div class="btn-group">

                  </div>
                  <div>
                      <label>Tags<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="tags" aria-label="Default" placeholder="#SHOW #BALADA #MUSICAAOVIVO #SAMBA"></input>
                    </div>
                  </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-sm " style="padding:1%;">
            <div class="card-body">
              <div>
                  <label>Descrição da atração.<a style="color:red"> *</a></label>
                <div class="input-group mb-3">
                    <textarea type="text" class="form-control" name="descricao" aria-label="Default" placeholder="Descreva aqui sobre a atração."></textarea>
                </div>
              </div>
              <div>
                <button class="btn btn-primary">Salvar e Adicionar outra Atração</button>
                <button class="btn btn-primary">Sair</button>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection
