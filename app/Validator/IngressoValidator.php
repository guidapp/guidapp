<?php

namespace App\Validator;
use App\Ingresso;

class IngressoValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Ingresso::$rules,
            Ingresso::$messages);


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
