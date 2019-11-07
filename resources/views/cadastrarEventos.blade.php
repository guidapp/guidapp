<html>
    <body>
        <title>Cadastrar eventos</title>
    </body>
    <head>
       
        
        <form action='/cadastrareventosalvar' method='post'>
        @csrf
            

            EstabelecimentoID: <input type="number" name="estabelecimento_id"><br>
            Nome: <input type="text" name="nome"><br>
            Descricao: <input type="text" name="descricao"><br>
            Avaliacao: <input type="number" name="avaliacao"><br>
            Visitas: <input type="number" name="visitas"><br>
            

            
            <input type='submit' value='cadastrar'/>
        </form>
    </head>
</html>