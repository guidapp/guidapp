@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
      <div style="width:100%;">
          <div class="card">
            @if(isset($estabelecimento))
              <form action="{{route('estabelecimento.alterar', [$estabelecimento->id])}}" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="card-header">Atualizar Estabelecimento</div>
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
                @if(isset($estabelecimento->imagems[0]))
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
                          <input type="text" class="@error('nome_estabelecimento') is-invalid @enderror form-control" name="nome" aria-label="Default" value="{{ $estabelecimento->nome }}">
                        @else
                          <input type="text" class="@error('nome_estabelecimento') is-invalid @enderror form-control" name="nome" aria-label="Default" placeholder="Digite o nome do estabelecimento.">
                        @endif
                      </div>
                    </div>

                    <div>
                      <label>Horário de Funcionamento<a style="color:red"> *</a></label>
                      <div class="input-group mb-3">
                        @if(isset($estabelecimento))
                          <input type="text" class="@error('horario') is-invalid @enderror form-control" name="horario" aria-label="Default" value="{{ $estabelecimento->horario }}">
                        @else
                          <input type="text" class="@error('horario') is-invalid @enderror form-control" name="horario" aria-label="Default" placeholder="Horário de funcionamento.">
                        @endif
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
          <div class="row">
            <div class="col-sm-6 " style="margin-left:2%;">
              <div>
                <label>Telefone<a style="color:red"> *</a></label>
                <div class="input-group mb-3">
                  @if(isset($estabelecimento))
                    <input type="text" class="@error('telefone') is-invalid @enderror form-control" name="telefone" aria-label="Default" value="{{ $estabelecimento->telefone }}">
                  @else
                    <input type="text" class="@error('telefone') is-invalid @enderror form-control" name="telefone" aria-label="Default" placeholder="Digite o telefone.">
                  @endif
                </div>
              </div>
            </div>

            <div class="col-sm-5" style="margin-left:1%;">
              <div>
                <label>Cidade<a style="color:red"> *</a></label>
                <div class="input-group mb-3">
                  @if(isset($estabelecimento))
                    <input type="text" class="@error('cidade') is-invalid @enderror form-control" name="cidade" aria-label="Default" value="{{ $estabelecimento->cidade }}">
                  @else
                    <input type="text" class="@error('cidade') is-invalid @enderror form-control" name="cidade" aria-label="Default" placeholder="Digite a cidade do estabelecimento.">
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="row">
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
                  <a href="{{url()->previous()}}" class="btn btn-danger">Cancelar</a>
                  @if(isset($estabelecimento))
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                  @else
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                  @endif
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
