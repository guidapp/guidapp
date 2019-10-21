<?php

namespace App\Validator;
use App\Apresentacao;

class ApresentacaoValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Apresentacao::$rules,
            Apresentacao::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro ao validar Apresentacao");
        }
    }
}
