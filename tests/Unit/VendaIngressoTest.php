<?php

namespace Tests\Unit;

use App\Validator\VendaIngressoValidator;
use App\VendaIngresso;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VendaIngressoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $venda_ingresso = new VendaIngresso();
        $venda_ingresso = factory(VendaIngresso::class)->make();

        VendaIngressoValidator::validate($venda_ingresso->toArray());

        $this->assertTrue(true);
    }
}
