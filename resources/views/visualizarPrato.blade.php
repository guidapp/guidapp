@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div style="width:100%;">
        <div class="card">
          <div class="card-header">Prato</div>

          <div class="row">
            <div class="col-sm-6 text-left">
              @if(isset($prato->imagem))
                <img id="image-preview" style="max-width: 500px;max-height: 300px;" src="/{{ $prato->imagem->nome }}"></img>
              @else
                <img id="image-preview" style="max-width: 500px;max-height: 300px;"></img>
              @endif
            </div>
            
            <div class="col-sm-6 text-left">
              <div class="card-body">
                <div class="p-2 bd-highlight">
                  <div>
                    <label>Nome do prato: {{$prato->nome}}</label>
                  </div>

                  <div>
                    <label>Preço: R$ {{ $prato->preco }}</label>
                  </div>

                  <div>
                    <label>Tags: {{ $prato->tags }}</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 ">
                <div class="card-body">
                    <label>Descrição:</label>
                    <label>{{ $prato->descricao }}</label>
                </div>
            </div>
          </div>
        </div>

        <a href="{{url()->previous()}}" class="btn btn-primary" style="margin: 20px">Voltar</a>
      </div>
    </div>
</div>
@endsection