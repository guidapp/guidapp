@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
      <div style="width:100%;">
        <div class="card">
          <form action="{{route('evento.salvar')}}">
          <div class="card-header">Criar Evento</div>
          <div class="row">
            <div class="card-body">
                <div class="card-body">Area das imagens</div>
            </div>
            <div class="card-body">
              <div class="card-body">
                <div class="p-2 bd-highlight">
                  <div>
                      <label>Nome do evento<a style="color:red"> *</a></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nome_evento" aria-label="Default" placeholder="Digite o nome do evento.">
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
                  <label>Descrição<a style="color:red"> *</a></label>
                <div class="input-group mb-3">
                    <textarea type="text" class="form-control" name="descricao" aria-label="Default" placeholder="Descreva aqui sobre o evento."></textarea>
                </div>
              </div>
              <div>
                  <label>Ingresso</label>
                <div class="input-group mb-3">
                    <textarea type="text" class="form-control" name="ingresso" aria-label="Default" placeholder="Descreva aqui sobre o ingresso."></textarea>
                </div>
              </div>
              <div>
                  <label>Pagamento</label>
                <div class="input-group mb-3">
                    <textarea type="text" class="form-control" name="ingresso" aria-label="Default" placeholder="Descreva aqui a forma de pagamento para o seu evento."></textarea>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Próximo</button>
                <button class="btn btn-primary">Cancelar</button>
              </div>
            </div>
        </div>
        </form>
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
