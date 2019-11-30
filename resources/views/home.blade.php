@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm" style="padding:1%;">
            <div class="card">
                <div class="card-header">Dashboard1</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Lista: Eventos/estabelecimentos
                </div>
            </div>
        </div>
        <div class="col-sm" style="padding:1%;">
            <div class="card">
                <div class="card-header">Dashboard2</div>

                <div class="card-body">Descrição: eventos/estabelecimentos</div>
            </div>
        </div>
    </div>
    <div class="row" style="padding:1%;">
    <div style="width:100%;">
      <div class="card" >
        <div class="card-header">Dashboard2</div>
        <div class="card-body">Comentários: eventos/estabelecimentos</div>
      </div>
    </div>
    </div>
</div>
@endsection
