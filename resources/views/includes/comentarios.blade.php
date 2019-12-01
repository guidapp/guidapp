<?php $comentarioable=null; ?>

@if(isset($evento))
    <?php $comentarioable=$evento; ?>
@elseif(isset($estabelecimento))
    <?php $comentarioable=$estabelecimento; ?>
@elseif(isset($prato))
    <?php $comentarioable=$prato; ?>
@endif

@if($comentarioable == null)
    <div>ERRO</div>
@else
    <div>
        <form action='/comentarios/{{ $comentarioable->getModelName() }}/{{ $comentarioable->id }}/add' method='post'>
        @csrf
            Adicionar comentario: <input type="text" name="texto">
            <input type='submit' value='Enviar'/>
        </form>            

        <table class="table table-striped">
            @foreach ($comentarioable->comentarios as $comentario)
                <tr>
                    <td style='@if($comentario->lidoAgora) background: #aef1fc; @endif' colspan='2'><h3>{{ $comentario->usuario->name }}</h3> {{ $comentario->texto }}</td>
                    @can('responderComentario', $comentarioable)
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
                    <td>
                        <div style="background-color: lightskyblue;border-radius: 10px;">
                            <a>resposta do <br> organizador</a>
                        </div>
                    </td>
                    <td style='@if($resposta->lidoAgora) background: #aef1fc; @endif'>
                        <h3>{{ $resposta->usuario->name }}</h3> {{ $resposta->texto }}
                    </td>
                </tr>
                @endforeach
            @endforeach
            <tr>

            </tr>
        </table>
    </div>
@endif