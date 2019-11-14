<html>
    <body>
        <title>Comentarios Nao Lidos</title>
    </body>
    <head>

        @if(Session::has('success'))
            <h3 >{{ Session::get('success') }}</h3>
        @endif
        
        <h1>GUIDAPP</h1>

        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif

        @if(Auth::user()->ehOrganizador())
            <h3>Comentarios para mim</h3>
            @if (count($comentarios) > 0)
                @foreach ($comentarios as $comentarioable => $relacoes)
                    <table>
                        <tr><th style='border:1px solid black' colspan='2'>{{ $comentarioable }}</th></tr>

                        @foreach ($relacoes as $id => $relacao)
                            <tr>
                                <td style='border:1px solid black'>{{ $relacao[0]->comentarioable->nome }}</td>
                                <td style='border:1px solid black'>{{ count($relacao) }}@if(count($relacao) == 1) comentário não lido @else comentários não lidos @endif</td>
                                <td><a href="/comentarios/{{ $relacao[0]->comentarioable->getModelName() }}/{{ $id }}">Ler comentários</a></td>
                            </tr>
                        @endforeach
                    </table>
                @endforeach
            @else
                <h4>0 comentários não lidos</h4>
            @endif
        @endif

        <h3>Respostas de meus comentarios</h3>
        @if (count($respostas) > 0)
            @foreach ($respostas as $comentarioable => $relacoes)
                <table>
                    <tr><th style='border:1px solid black' colspan='2'>{{ $comentarioable }}</th></tr>

                    @foreach ($relacoes as $id => $relacao)
                        <tr>
                            <td style='border:1px solid black'>{{ $relacao[0]->comentarioable->nome }}</td>
                            <td style='border:1px solid black'>{{ count($relacao) }}@if(count($relacao) == 1) resposta não lida @else respostas não lidas @endif</td>
                            <td><a href="/comentarios/{{ $relacao[0]->comentarioable->getModelName() }}/{{ $id }}">Ler respostas</a></td>
                        </tr>
                    @endforeach
                </table>
            @endforeach
        @else
            <h4>0 respostas não lidas</h4>
        @endif
</html>