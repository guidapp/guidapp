<?php

namespace App\Validator;
use App\Comentario;

class ComentarioValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Comentario::$rules,
            Comentario::$messages);


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
