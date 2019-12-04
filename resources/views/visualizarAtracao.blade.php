@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div style="width:100%;">
        <div class="card">
        <div class="card-header">Detalhes da Atração</div>

        <div class="row">
            <div class="col-sm-6 text-left">
            @if(isset($atracao->imagems[0]))
                <img id="image-preview" style="max-width: 500px;max-height: 300px;" src="/{{ $atracao->imagems[0]->nome }}"></img>
            @else
                <img id="image-preview" style="max-width: 500px;max-height: 300px;"></img>
            @endif
            </div>
            
            <div class="col-sm-6 text-left">
            <div class="card-body">
                <div class="p-2 bd-highlight">
                <div>
                    <label>Nome do atracao: {{ $atracao->nome }}</label>
                </div>

                <div>
                    <label>Horário: {{ $atracao->horario }}</label>
                </div>

                <div>
                    <label>Tags: {{ $atracao->tags }}</label>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="col-sm " style="padding:1%;">
        <div class="card-body">
            <label>Descrição: {{ $atracao->descricao }}</label>
        </div>

        <div>
        <a href="{{url()->previous()}}" class="btn btn-primary">Voltar</a>
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