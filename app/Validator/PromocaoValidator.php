<?php

namespace App\Validator;

use App\Promocao;

class PromocaoValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Promocao::$rules,
            Promocao::$messages);


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
