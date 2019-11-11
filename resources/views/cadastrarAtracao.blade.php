<html>
    <body>
        <title>Cadastrar atrações</title>
    </body>
    <head>
       
        
        <form action='/cadastraratracaosalvar' method='post'>
        @csrf
            Nome: <input type="text" name="nome"><br>
            Descricao: <input type="text" name="descricao"><br>
            <input type='submit' value='cadastrar'/>
        </form>
    </head>
</html>