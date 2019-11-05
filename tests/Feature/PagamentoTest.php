<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Session;

use App\User;
use App\Ingresso;
use App\VendaIngresso;
use App\Pagamento;

class PagamentoTest extends TestCase
{
    public function testTelaCompraIngressos()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->get('/compraingresso/1');

        $response->assertStatus(200)
            ->assertSee('Compra de ingressos')
            ->assertSee('Preço')
            ->assertSee('comprar');
    }

    public function testComprarIngresso() {
        $user = User::find(1);
        
        $response = $this->actingAs($user)
            ->post('/compraingresso', ['quantidade' => 3, 'ingresso_id' => 1]);

        $response->assertStatus(302)
            ->assertRedirect(route('paypal.ingresso'));
    }

    public function testFinalizacaoCompraIngresso() {
        $ingressosVendidos = factory(VendaIngresso::class, 10)->create();
        $user = User::find(1);

        $pagamento = Pagamento::gerarPagamento($user, $ingressosVendidos);

        Session::put('pagamento_id', $pagamento->id);
        Session::put('id_pag_paypal', 'id_pagamento_paypal');

        $response = $this->actingAs($user)
            ->followingRedirects()
            ->get(route('paypal.ingresso.status'));

        $response->assertStatus(200)
            ->assertSee('Compra efetuada com sucesso!');
    }

    public function testComprarIngressoSemEstarLogado() {
        $response = $this->post('/compraingresso', ['quantidade' => 3, 'ingresso_id' => 1]);

        $response->assertStatus(302);
    }

    public function testComprarIngressosEsgotados() {
        $ingresso = factory(Ingresso::class)->create(['quantidade' => 0]);

        $user = User::find(1);

        $response = $this->actingAs($user)
            ->post('/compraingresso', ['quantidade' => 3, 'ingresso_id' => $ingresso->id]);

        $response->assertStatus(200)
            ->assertSee('Ingressos esgotados');
    }

    public function testTelaListaDeIngressosPagos() {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->get('/ingressos');

        $response->assertStatus(200)
            ->assertSee('Ingressos comprados');
    }

    public function testListaDeIngressosPagos() {
        $user = User::find(1);

        $ingresso = factory(Ingresso::class)->create();

        $response = $this->actingAs($user)
            ->post('/compraingresso', ['quantidade' => 3, 'ingresso_id' => $ingresso->id]);

        $response = $this->actingAs($user)
            ->get('/ingressos');

        $response->assertStatus(200)
            ->assertSee('Ingressos comprados')
            ->assertSee(substr($ingresso->descricao, 0, 30));
    }
}
