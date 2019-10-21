<?php

namespace App\Validator;
use App\EstabelecimentoUser;

class EstabelecimentoUserValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            EstabelecimentoUser::$rules,
            EstabelecimentoUser::$messages);


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
