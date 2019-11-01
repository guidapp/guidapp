<html>
    <body>
        <title>Compra de ingressos</title>
    </body>
    <head>
        <h1>GUIDAPP</h1>
        <h2>Compra de ingressos</h2>
        <h3>Evento: {{ $ingresso->evento->nome }}</h3>
        <h3>Descrição do ingresso: {{ $ingresso->descricao }}</h3>
        <h3>Quantidade disponível: {{ $ingresso->quantidadeIngressosDisponiveis() }}</h3>
        <h3>Preço: R$ {{ $ingresso->preco }}</h3>
        <h3>Desconto: {{ $ingresso->desconto }}%</h3>
        <h3>Preço com desconto: R$ {{ $ingresso->preco * (100 - $ingresso->desconto)/100 }}</h3>
        
        <form action='/compraingresso' method='post'>
        @csrf
            <input type="hidden" name="ingresso_id" value="{{ $ingresso->id }}">
            Quantidade: <input type="text" name="quantidade"><br>
            <h3>Preço total: R$ ?</h3>
            <input type='submit' value='comprar'/>
        </form>
    </head>
</html>