<?php

namespace Tests\Unit;

use App\Evento;
use App\Validator\EventoValidator;
use App\Validator\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $evento = new Evento();
        $evento = factory(Evento::class)->make();

        EventoValidator::validate($evento->toArray());

        $this->assertTrue(true);
    }
}
