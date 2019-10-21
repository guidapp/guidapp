<?php

namespace Tests\Unit;

use App\Ingresso;
use App\Validator\IngressoValidator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IngressoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $ingresso = new Ingresso();
        $ingresso = factory(Ingresso::class)->make();

        IngressoValidator::validate($ingresso->toArray());

        $this->assertTrue(true);
    }
}
