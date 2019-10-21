<?php

namespace Tests\Unit;

use App\EventoUnico;
use App\Validator\EventoUnicoValidator;
use App\Validator\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventoUnicoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $evento_unico = new EventoUnico();
        $evento_unico = factory(EventoUnico::class)->make();

        EventoUnicoValidator::validate($evento_unico->toArray());

        $this->assertTrue(true);
    }
}
