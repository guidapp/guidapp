<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
use App\Evento;

class ImagemController extends Controller
{
    function store(Request $resquest) {
        $repositorio = new ImageRepository();

        $nomeImagem = $repositorio->saveImage($resquest['image'], 'evento', 1, 250);

        if($nomeImagem == '') {
            return 'erro';
        }

        $evento = Evento::find(1);
        $evento->addImagem($nomeImagem);

        return 'OK';
    }
}
