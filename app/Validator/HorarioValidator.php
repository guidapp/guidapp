<?php

namespace App\Validator;
use App\Horario;

class HorarioValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Horario::$rules,
            Horario::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, $validator->errors(0));
        }
    }
}
