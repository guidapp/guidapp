<?php

namespace Tests\Unit;

use App\Avaliacao_evento;
use App\Validator\Avaliacao_eventoValidator;
use App\Validator\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Avaliacao_eventoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $avaliacao_evento = new Avaliacao_evento();
        $avaliacao_evento = factory(\App\Avaliacao_evento::class)->make();

        Avaliacao_eventoValidator::validate($avaliacao_evento->toArray());

        $this->assertTrue(true);
    }
}
