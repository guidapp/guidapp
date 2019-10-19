<?php

namespace Tests\Unit;

use App\Impulsionamento;
use App\Validator\ImpulsionamentoValidator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImpulsionamentoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $impulsionamento = new Impulsionamento();
        $impulsionamento = factory(Impulsionamento::class)->make();

        ImpulsionamentoValidator::validate($impulsionamento->toArray());

        $this->assertTrue(true);
    }
}
