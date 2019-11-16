@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
      <div style="width:100%;">
        <div class="card">
          <div class="card-header">Criar Estabelecimento</div>
          <div class="row">
            <div class="card-body">
                <div class="card-body">Area das imagens</div>
            </div>
            <div class="card-body">
              <div class="card-body">
                <div class="p-2 bd-highlight">
                  <div>
                      <label>Nome do Estabelecimento<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nome_estabelecimento" aria-label="Default" placeholder="Digite o nome do evento.">
                    </div>
                  </div>
                  <div class="btn-group">
                    <div>
                        <label>Local<a style="color:red"> *</a></label>
                      <div class="input-group mb-3">
                          <button class="btn btn-primary" style="width:120px;">Abrir Mapa</button>
                      </div>
                    </div>
                    <div style="margin-left:3%;">
                        <label>Data e Hora<a style="color:red"> *</a></label>
                      <div class="input-group mb-3">
                            <button class="btn btn-primary" style="width:200px;">Horário de Funcionamento</button>
                      </div>
                    </div>
                  </div>
                  <div>
                      <label>Tags<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="tags" aria-label="Default" placeholder="#RESTAURANTE #MUSICAAOVIVO #SAMBA #FORRO"></input>
                    </div>
                  </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-sm " style="padding:1%;">
            <div class="card-body">
              <div>
                  <label>Descrição<a style="color:red"> *</a></label>
                <div class="input-group mb-3">
                    <textarea type="text" class="form-control" name="descricao" aria-label="Default" placeholder="Fale sobre o seu estabelecimento."></textarea>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Próximo</button>
                <button class="btn btn-primary">Cancelar</button>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
