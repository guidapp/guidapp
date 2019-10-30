<?php

namespace Tests\Unit;

use App\Validator\VendaIngressoValidator;
use App\VendaIngresso;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Ingresso;
use App\User;

class VendaIngressoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $venda_ingresso = new VendaIngresso();
        $venda_ingresso = factory(VendaIngresso::class)->make();

        VendaIngressoValidator::validate($venda_ingresso->toArray());

        $this->assertTrue(true);
    }

    public function testValidarVendaIngresso()
    {
        $venda_ingresso = VendaIngresso::find(1);

        $venda_ingresso->validar();

        $this->assertTrue($venda_ingresso->validado);
    }

    public function testReducaoQuantidadeAposVenda()
    {
        $ingresso = factory(Ingresso::class)->create();
        $ingresso->quantidade = 5;

        $user = User::find(1);

        $ingresso->vender($user, 2);

        $this->assertEquals(3, $ingresso->quantidade);
    }

    public function testIngressosDoUsuarioAposVenda()
    {
        $ingresso = factory(Ingresso::class)->create();

        $user = User::find(1);

        $ingresso->vender($user, 2);

        $qnt_ingressos_comprados = $user->compraIngressos->where('ingresso_id',$ingresso->id)->count();

        $this->assertEquals(2, $qnt_ingressos_comprados);
    }
}
