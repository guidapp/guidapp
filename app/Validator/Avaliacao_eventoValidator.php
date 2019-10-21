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


        if ($validator->errors()) {
            foreach ($validator->errors()->all() as $error) {
                throw new ValidationException($validator, $error);
            }
        }

        /* if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator,
                "Erro ao validar Apresentacao"
            );
        } */
    }
}
