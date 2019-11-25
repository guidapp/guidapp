<?php

namespace App\Validator;
use App\Atracao;

class AtracaoValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Atracao::$rules,
            Atracao::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro ao validar Atracao");
        }
    }
}
