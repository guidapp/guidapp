<html>
    <head>

    </head>
    <body>
        <form action="{{ route('imagem.cadastrar') }}" method="post" enctype="multipart/form-data">
        @csrf
            <input type="file" name="image">
            <input type="submit" value="Enviar" name="submit">
        </form>
    </body>
</html>