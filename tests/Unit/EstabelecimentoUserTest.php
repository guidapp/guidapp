<?php

namespace Tests\Unit;

use App\EstabelecimentoUser;
use App\Validator\EstabelecimentoUserValidator;
use App\Validator\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EstabelecimentoUserTest extends TestCase
{
    public function testDadosCorretos()
    {
        $estabelecimento = new EstabelecimentoUser();
        $estabelecimento = factory(\App\EstabelecimentoUser::class)->make();

        EstabelecimentoUserValidator::validate($estabelecimento->toArray());

        $this->assertTrue(true);
    }
}
