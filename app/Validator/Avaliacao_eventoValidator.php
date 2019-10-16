<?php

namespace App\Validator;
use App\Avaliacao_evento;

class Avaliacao_eventoValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Avaliacao_evento::$rules,
            Avaliacao_evento::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator,
                $validator->errors(0)
                //"Erro ao validar Apresentacao"
            );
        }
    }
}
