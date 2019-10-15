<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Horario;
use App\Validator\HorarioValidator;
use App\Validator\ValidationException;

class HorarioTest extends TestCase
{
    public function testDadosCorretos()
    {
        $horario = new Horario();
        $horario = factory(\App\Horario::class)->make();

        HorarioValidator::validate($horario->toArray());

        $this->assertTrue(true);
    }
}
