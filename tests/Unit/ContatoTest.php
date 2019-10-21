<?php

namespace Tests\Unit;

use App\Contato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\Validator\ContatoValidator;
use App\Validator\ValidationException;
class ContatoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $contato = new Contato();
        $contato = factory(\App\Contato::class)->make();

        ContatoValidator::validate($contato->toArray());

        $this->assertTrue(true);
    }
}
