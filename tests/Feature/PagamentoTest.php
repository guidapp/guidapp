<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;
use App\Ingresso;

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
}
