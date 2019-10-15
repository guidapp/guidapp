<?php

namespace App\Validator;
use App\Contato;

class ContatoValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Contato::$rules,
            Contato::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro ao validar Contato");
        }
    }
}
