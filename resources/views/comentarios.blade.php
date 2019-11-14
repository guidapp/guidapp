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

        <h2>Comentarios do {{ $object->getModelName() }} {{ $object->nome }}</h2>

        <br>

        <table>
            @foreach ($object->comentarios as $comentario)
                <tr>
                    <td style='border:1px solid black; @if($comentario->lidoAgora) background: #aef1fc; @endif' colspan='2'><h3>{{ $comentario->usuario->name }}</h3> {{ $comentario->texto }}</td>
                    @can('responderComentario', $object)
                    <td>
                        <form action='/comentarios/responder/{{ $comentario->id }}' method='post'>
                        @csrf
                            Resposta: <input type="text" name="texto"><br>
                            <input type='submit' value='Enviar'/>
                        </form>
                    </td>
                    @endcan
                </tr>

                @foreach ($comentario->respostas as $resposta)
                <tr>
                    <td>resposta do <br> organizador</td>
                    <td style='border:1px solid black; @if($resposta->lidoAgora) background: #aef1fc; @endif }}'><h3>{{ $resposta->usuario->name }}</h3> {{ $resposta->texto }}</td>
                </tr>
                @endforeach
            @endforeach
            <tr>

            </tr>
        </table>

        <br>

        <form action='/comentarios/{{ $object->getModelName() }}/{{ $object->id }}/add' method='post'>
        @csrf
            Adicionar comentario: <input type="text" name="texto">
            <input type='submit' value='Enviar'/>
        </form>
</html>