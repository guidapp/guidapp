<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Ingresso;
use App\User;

class IngressoTest extends TestCase
{
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
