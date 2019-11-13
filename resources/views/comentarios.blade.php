<html>
    <body>
        <title>Comentarios</title>
    </body>
    <head>

        @if(Session::has('success'))
            <h3 >{{ Session::get('success') }}</h3>
        @endif
        
        <h1>GUIDAPP</h1>

        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif

        <h2>Comentarios do {{ $model }} {{ $object->nome }}</h2>

        <br>

        @foreach ($object->comentarios as $comentario)
            <h4>{{ $comentario->usuario->name }} - {{ $comentario->texto }}</h4>
        @endforeach

        <form action='/comentarios/{{$model}}/{{$object->id}}/add' method='post'>
        @csrf
            Adicionar comentario: <input type="text" name="texto">
            <input type='submit' value='Enviar'/>
        </form>
</html>