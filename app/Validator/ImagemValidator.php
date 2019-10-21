<?php

namespace App\Validator;
use App\Imagem;

class ImagemValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Imagem::$rules,
            Imagem::$messages);


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
