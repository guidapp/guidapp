<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Atracao;
use App\Validator\AtracaoValidator;
use App\Validator\ValidationException;

class AtracaoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $atracao = new Atracao;
        $atracao = factory(\App\Atracao::class)->make();

        AtracaoValidator::validate($atracao->toArray());

        $this->assertTrue(true);
    }
}
