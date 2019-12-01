@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div style="width:100%;">
        <div class="card">
          <!-- verificar se o usuario vai add ou editar um prato -->
          @if(isset($prato))
            <form action="" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-header">Atualizar Prato</div>
          @else
            <form action="" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-header">Criar Cadastrar</div>
          @endif

          <div class="row">
            <div class="col-sm-6 text-left">
              @if(isset($prato->imagems[0]))
                <img id="image-preview" style="max-width: 500px;max-height: 300px;" src="/{{ $prato->imagems[0]->nome }}"></img>
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
                      <label>Nome do prato<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                      @if(isset($prato))
                        <input type="text" class="@error('nome') is-invalid @enderror form-control" name="nome" aria-label="Default" value="{{ $prato->nome }}">
                      @else
                        <input type="text" class="@error('nome') is-invalid @enderror form-control" name="nome" aria-label="Default" placeholder="Digite o nome do prato.">
                      @endif
                    </div>
                  </div>

                  <div class="btn-group">
                    <div>
                        <label>Preço<a style="color:red"> *</a></label>
                        <div class="input-group mb-3">
                            @if(isset($prato))
                                <input type="text" class="@error('preco') is-invalid @enderror form-control" name="preco" aria-label="Default" value="{{ $prato->preco }}">
                            @else
                                <input type="text" class="@error('preco') is-invalid @enderror form-control" name="preco" aria-label="Default" placeholder="Digite o preço do prato.">
                            @endif
                        </div>
                    </div>
                  </div>

                  <div>
                      <label>Tags<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                      @if(isset($prato))
                        <textarea type="text" class="form-control" name="tags" aria-label="Default">{{ $prato->tags }}</textarea>
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
                    @if(isset($prato))
                      <textarea type="text" class="form-control" name="descricao" aria-label="Default">{{ $prato->descricao }}</textarea>
                    @else
                      <textarea type="text" class="form-control" name="descricao" aria-label="Default" placeholder="Descreva aqui sobre o prato."></textarea>
                    @endif
                </div>
              </div>
        </div>

        <div>
            <button class="btn btn-danger">Cancelar</button>
            @if(isset($prato))
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