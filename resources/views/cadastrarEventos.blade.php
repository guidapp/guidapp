@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div style="width:100%;">
        <div class="card">
          <!-- verificar se o usuario vai add ou editar um evento -->
          @if(isset($eventos))
            <form action="{{route('atualizar.evento.cadastrar')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-header">Atualizar Evento</div>
            <input type="hidden" name="idEvento" value="{{$eventos->id}}">  <!--  armazena o ID do Evento -->
          @else
            <form action="{{route('evento.salvar')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-header">Criar Evento</div>
          @endif

          @if(isset($idEstabelecimento))
            <input type="hidden" name="id_estabelecimento" value="{{$idEstabelecimento}}">  <!--  armazena o ID do Estabelecimento -->
          @endif

            <!--#####################################################  inputs temporarios ################################################ -->
            <input type="hidden" name="latitude" value="100">
            <input type="hidden" name="longitude" value="100">
            <!--#####################################################  x inputs temporarios  x ################################################ -->




          <div class="row">
            <div class="col-sm-6 text-left">
              @if(isset($eventos->imagems[0]))
                <img id="image-preview" style="max-width: 500px;max-height: 300px;" src="/{{ $eventos->imagems[0]->nome }}"></img>
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
                      <label>Nome do evento<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                      @if(isset($eventos))
                        <input type="text" class="@error('nome') is-invalid @enderror form-control" name="nome" aria-label="Default" value="{{ $eventos->nome }}">
                      @else
                        <input type="text" class="@error('nome') is-invalid @enderror form-control" name="nome" aria-label="Default" placeholder="Digite o nome do evento.">
                      @endif
                    </div>
                    @if ($errors->has('nome'))
                      <a style="color: red; font-weight: bold;">{{ $errors->first('nome') }}</a>
                    @endif
                  </div>
                  <div>
                      <label>Endereço do evento<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                      @if(isset($eventos))
                        <input type="text" class="@error('endereco') is-invalid @enderror form-control" name="endereco" aria-label="Default" value="{{ $eventos->endereco }}">
                      @else
                        <input type="text" class="@error('endereco') is-invalid @enderror form-control" name="endereco" aria-label="Default" placeholder="Digite o endereço do evento.">
                      @endif
                    </div>
                    @if ($errors->has('endereco'))
                      <a style="color: red; font-weight: bold;">{{ $errors->first('endereco') }}</a>
                    @endif
                  </div>
                  <div class="btn-group">
                    {{-- <div>
                        <label>Local<a style="color:red"> *</a></label>
                      <div class="input-group mb-3">
                          <button class="btn btn-primary" style="width:120px;">Abrir Mapa</button>
                      </div>
                    </div> --}}
                    <div style="margin-left:3%;">
                        <label>Horário<a style="color:red"> *</a></label>
                      <div class="input-group mb-3">
                          @if(isset($eventos))
                            <input type="time" class="form-control" name="horario" aria-label="Default" value="{{ $eventos->horario }}"></input>
                          @else
                            <input type="time" class="form-control" name="horario" aria-label="Default"></input>
                          @endif
                      </div>
                      @if ($errors->has('horario'))
                        <a style="color: red; font-weight: bold;">{{ $errors->first('horario') }}</a>
                      @endif
                    </div>
                    <div style="margin-left:3%;">
                        <label>Data<a style="color:red"> *</a></label>
                      <div class="input-group mb-3">
                          @if(isset($eventos))
                            <input type="date" class="form-control" name="data" aria-label="Default" value="{{ $eventos->data }}"></input>
                          @else
                            <input type="date" class="form-control" name="data" aria-label="Default" placeholder="#SHOW #BALADA #MUSICAAOVIVO #SAMBA"></input>
                          @endif
                      </div>
                    </div>
                  </div>
                  <div>
                      <label>Tags<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                      @if(isset($eventos))
                        <textarea type="text" class="form-control" name="tags" aria-label="Default">{{ $eventos->tags }}</textarea>
                      @else
                        <input type="text" class="form-control" name="tags" aria-label="Default" placeholder="#SHOW #BALADA #MUSICAAOVIVO #SAMBA"></input>
                      @endif
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
                    @if(isset($eventos))
                      <textarea type="text" class="form-control" name="descricao" aria-label="Default">{{ $eventos->descricao }}</textarea>
                    @else
                      <textarea type="text" class="form-control" name="descricao" aria-label="Default" placeholder="Descreva aqui sobre o evento."></textarea>
                    @endif
                </div>
              </div>
              <div>
                <a href="{{url()->previous()}}" class="btn btn-danger">Cancelar</a>
                @if(isset($eventos))
                  <button type="submit" class="btn btn-primary">Atualizar</button>
                @else
                  <button type="submit" class="btn btn-primary">Próximo</button>
                @endif
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
