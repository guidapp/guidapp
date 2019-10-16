<?php

namespace Tests\Unit;

use App\Apresentacao;
use App\Validator\ApresentacaoValidator;
use App\Validator\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApresentacaoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $apresentacao = new Apresentacao();
        $apresentacao = factory(\App\Apresentacao::class)->make();

        ApresentacaoValidator::validate($apresentacao->toArray());

        $this->assertTrue(true);
    }
}
