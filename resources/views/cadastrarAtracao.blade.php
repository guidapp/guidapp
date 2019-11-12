@extends('layouts.app')
@section('content')
<html>
    <body>
        <title>Cadastrar atrações</title>
    </body>
    <head>
       
        
        <form action='/cadastraratracaosalvar' method='post'>
        @csrf
            Nome: <input type="text" 
                class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" 
                name="nome" value="{{old('nome')}}"><br>
                @if ($errors->has('nome'))
                    <div class="invalid-feedback">
                        {{$errors->first('nome')}}
                    </div>
                @endif
            Descricao: <input type="text" 
                class="form-control {{$errors->has('descricao') ? 'is-invalid' : ''}}" 
                name="descricao" value="{{old('descricao')}}"><br>
                @if ($errors->has('descricao'))
                    <div class="invalid-feedback">
                        {{$errors->first('descricao')}}
                    </div>
                @endif
            <input type='submit' value='cadastrar'/>
        </form>
    </head>
</html>
@endsection