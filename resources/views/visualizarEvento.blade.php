@extends('layouts.app')
@section('content')
<div class="container">

  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">Evento</div>

        <div class="row">
          <div class="col-sm-6 text-left">
            @if(isset($evento->imagems[0]))
              <img id="image-preview" style="max-width: 500px;max-height: 300px;" src="/{{ $evento->imagems[0]->nome }}"></img>
            @else
              <img id="image-preview" style="max-width: 500px;max-height: 300px;"></img>
            @endif
          </div>

          <div class="col-sm-6 text-left">
            <div class="card-body">
              <div>
                <label>Nome do evento: {{ $evento->nome }}</label>
              </div>

              <div>
                <label>Local: </label>
                <button class="btn btn-primary" style="width:120px;">Abrir Mapa</button>
              </div>

              <div>
                <label>Data: {{ $evento->data }}</label>
              </div>

              <div>
                <label>Hora: {{ $evento->hora }}</label>
              </div>

              <div>
                <label>Tags: {{ $evento->tags }}</label>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <div class="card-body">
              <label>Descrição: {{ $evento->descricao }}</label>
            </div>
          </div>
        </div>
      
      </div>  
      
      <a href="{{url()->previous()}}" class="btn btn-primary" style="margin: 20px">Voltar</a>
          
    </div>
  </div>
</div>
@endsection