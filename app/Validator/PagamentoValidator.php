<?php

namespace App\Validator;

use App\Pagamento;

class PagamentoValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make(
            $dados,
            Pagamento::$rules,
            Pagamento::$messages);


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
