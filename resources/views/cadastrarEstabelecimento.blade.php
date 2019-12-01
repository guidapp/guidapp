@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
      <div style="width:100%;">
          <div class="card">
            @if(isset($estabelecimento))
              <form action="{{route('atualizar.estabelecimento.cadastrar')}}" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="card-header">Atualizar Estabelecimento</div>
              <input type="hidden" name="idEvento" value="{{$eventos->id}}">  <!--  armazena o ID do Evento -->
            @else
              <form action="{{route('estabelecimento.salvar')}}" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="card-header">Criar Estabelecimento</div>
            @endif


            <!--#####################################################  inputs temporarios ################################################ -->
            <input type="hidden" name="latitude" value="100">
            <input type="hidden" name="longitude" value="100">
            <!--#####################################################  x inputs temporarios  x ################################################ -->




            <div class="row">
              <div class="col-sm-6 text-left">
                @if(isset($estabelecimento))
                  <img id="image-preview" style="max-width: 500px;max-height: 300px;" src="/{{ $estabelecimento->imagems[0]->nome }}"></img>
                @else
                  <img id="image-preview" style="max-width: 500px;max-height: 300px;"></img>
                @endif
                <br>
                <input id="image" type="file" accept="image/*" name="imagem" onchange="loadFile(event)">
              </div>
              
              <div class="col-sm-6 text-left">
                <div class="card-body">
                  <div class="p-2 bd-highlight">
                    <div>
                      <label>Nome do Estabelecimento<a style="color:red"> *</a></label>
                      <div class="input-group mb-3">
                        @if(isset($estabelecimento))
                          <input type="text" class="@error('nome_estabelecimento') is-invalid @enderror form-control" name="nome_estabelecimento" aria-label="Default" value="{{ $estabelecimento->nome }}">
                        @else
                          <input type="text" class="@error('nome_estabelecimento') is-invalid @enderror form-control" name="nome_estabelecimento" aria-label="Default" placeholder="Digite o nome do estabelecimento.">
                        @endif
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
                      @if(isset($estabelecimento))
                        <textarea type="text" class="form-control" name="tags" aria-label="Default">{{ $estabelecimento->tags }}</textarea>
                      @else
                        <input type="text" class="form-control" name="tags" aria-label="Default" placeholder="#SHOW #BALADA #MUSICAAOVIVO #SAMBA"></input>
                      @endif
                    </div>
                    </div>
                  </div>
              </div>
          </div>
            <div class="col-sm " style="padding:1%;">
              <div class="card-body">
                <div>
                  <label>Descrição<a style="color:red"> *</a></label>
                  @if(isset($estabelecimento))
                    <textarea type="text" class="form-control" name="descricao" aria-label="Default">{{ $estabelecimento->descricao }}</textarea>
                  @else
                    <textarea type="text" class="form-control" name="descricao" aria-label="Default" placeholder="Fale sobre o seu estabelecimento."></textarea>
                  @endif
                </div>
                <div>
                  <button type="submit" class="btn btn-primary">Próximo</button>
                  <button class="btn btn-primary">Cancelar</button>
                </div>
              </div>
          </div>
        </div>
        </form>

        <script>
          var loadFile = function(event) {
            var preview = document.getElementById('image-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
          };
        </script>
      </div>
    </div>
</div>
@endsection
