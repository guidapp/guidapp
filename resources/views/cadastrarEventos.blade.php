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


            <!--#####################################################  inputs temporarios ################################################ -->
            <input type="hidden" name="latitude" value="100">
            <input type="hidden" name="longitude" value="100">
            <!--#####################################################  x inputs temporarios  x ################################################ -->




          <div class="row">
            <div class="col-sm-6 text-left">
              @if(isset($eventos))
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
                        <input type="text" class="@error('nome_evento') is-invalid @enderror form-control" name="nome_evento" aria-label="Default" value="{{ $eventos->nome }}">
                      @else
                        <input type="text" class="@error('nome_evento') is-invalid @enderror form-control" name="nome_evento" aria-label="Default" placeholder="Digite o nome do evento.">
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
                        <label>Data<a style="color:red"> *</a></label>
                      <div class="input-group mb-3">
                          <input type="date" class="form-control" name="dataEvento" aria-label="Default"></input>
                      </div>
                    </div>
                    <div style="margin-left:3%;">
                        <label>Hora<a style="color:red"> *</a></label>
                      <div class="input-group mb-3">
                          <input type="time" class="form-control" name="horaEvento" aria-label="Default"></input>
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
                    <label>Ingresso</label>
                  @if(isset($eventos))
                    <textarea type="text" class="form-control" name="ingresso" aria-label="Default">{{ $eventos->ingresso }}</textarea>
                  @else
                    <textarea type="text" class="form-control" name="ingresso" aria-label="Default" placeholder="Descreva aqui sobre o ingresso."></textarea>
                  @endif
                </div>
                <div>
                    <label>Pagamento</label>
                  <div class="input-group mb-3">
                    @if(isset($eventos))
                      <textarea type="text" class="form-control" name="pagamento" aria-label="Default">{{ $eventos->pagamento }}</textarea>
                    @else
                      <textarea type="text" class="form-control" name="pagamento" aria-label="Default" placeholder="Descreva aqui a forma de pagamento para o seu evento."></textarea>
                    @endif
                  </div>
                </div>
              <div>
                @if(isset($eventos))
                  <button type="submit" class="btn btn-primary">Atualizar</button>
                @else
                  <button type="submit" class="btn btn-primary">Próximo</button>
                @endif
                <button class="btn btn-primary">Cancelar</button>
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

<!-- <html>
    <body>
        <title>Cadastrar eventos</title>
    </body>
    <head>


        <form action='/cadastrareventosalvar' method='post'>
        @csrf


            EstabelecimentoID: <input type="number" name="estabelecimento_id"><br>
            Nome: <input type="text" name="nome"><br>
            Descricao: <input type="text" name="descricao"><br>
            Avaliacao: <input type="number" name="avaliacao"><br>
            Visitas: <input type="number" name="visitas"><br>



            <input type='submit' value='cadastrar'/>
        </form>
    </head>
</html> -->
