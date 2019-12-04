@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div style="width:100%;">
        <div class="card">
          <!-- verificar se o usuario vai add ou editar um atração -->
          @if(isset($atracao))
            <form action="{{route('atracao.atualizar', [$atracao->id])}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-header">Atualizar Atração</div>
          @else
            <form action="{{route('atracao.cadastrar', [$evento->id])}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-header">Criar Cadastrar</div>
          @endif

          <div class="row">
            <div class="col-sm-6 text-left">
              @if(isset($atracao->imagems[0]))
                <img id="image-preview" style="max-width: 500px;max-height: 300px;" src="/{{ $atracao->imagems[0]->nome }}"></img>
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
                    <label>Nome do atracao<a style="color:red"> *</a></label>
                  <div class="input-group mb-3">
                    @if(isset($atracao))
                      <input type="text" class="@error('nome') is-invalid @enderror form-control" name="nome" aria-label="Default" value="{{ old('nome', $atracao->nome) }}">
                    @else
                      <input type="text" class="@error('nome') is-invalid @enderror form-control" name="nome" aria-label="Default" placeholder="Digite o nome do atracao." value="{{ old('nome', '') }}">
                    @endif
                  </div>
                    @if ($errors->has('nome'))
                      <a style="color: red; font-weight: bold;">{{ $errors->first('nome') }}</a>
                    @endif
                  </div>

                  <div>
                    <label>Hora<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                        @if(isset($atracao))
                            <input type="time" class="@error('hora') is-invalid @enderror form-control" name="hora" aria-label="Default" value="{{ old('hora', $atracao->hora) }}">
                        @else
                            <input type="time" class="@error('hora') is-invalid @enderror form-control" name="hora" aria-label="Default" placeholder="Digite o hora do atração." value="{{ old('hora', '') }}">
                        @endif
                    </div>
                    @if ($errors->has('hora'))
                      <a style="color: red; font-weight: bold;">{{ $errors->first('hora') }}</a>
                    @endif
                  </div>

                  <div>
                    <label>Tags</label>
                  <div class="input-group mb-3">
                  @if(isset($atracao))
                    <textarea type="text" class="form-control" name="tags" aria-label="Default">{{ $atracao->tags }}</textarea>
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
              <label>Descrição</label>
            <div class="input-group mb-3">
              @if(isset($atracao))
                <textarea type="text" class="@error('descricao') is-invalid @enderror form-control" name="descricao" aria-label="Default">{{ old('descricao', $atracao->descricao) }}</textarea>
              @else
                <textarea type="text" class="@error('descricao') is-invalid @enderror form-control" name="descricao" aria-label="Default" placeholder="Descreva aqui sobre o atracao.">{{ old('descricao', '') }}</textarea>
              @endif
            </div>
          </div>
          @if ($errors->has('descricao'))
            <a style="color: red; font-weight: bold;">{{ $errors->first('descricao') }}</a>
          @endif
        </div>

        <div>
          <a href="{{url()->previous()}}" class="btn btn-danger">Cancelar</a>
          @if(isset($atracao))
              <button type="submit" class="btn btn-primary">Atualizar</button>
          @else
              <button type="submit" class="btn btn-primary">Cadastrar</button>
          @endif
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