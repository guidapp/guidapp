<html>
    <body>
        <title>Ingressos comprados</title>
    </body>
    <head>
        <h1>GUIDAPP</h1>
        <h2>Ingressos comprados</h2>

        <h3>ID  Descrição</h3>

        @foreach ($ingressos as $ingresso)
            <h4>{{ $ingresso->id }} - {{ $ingresso->ingresso->descricao }}</h4>
        @endforeach
</html>