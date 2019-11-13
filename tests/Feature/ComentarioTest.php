<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;

class ComentarioTest extends TestCase
{
    public function testTelaComentariosDeEvento()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->get('/evento/1/comentarios');

        $response->assertStatus(200)
            ->assertSee('Comentarios');
    }

    public function testTelaComentariosDeEventoNaoLogado()
    {
        $response = $this
            ->get('/evento/1/comentarios');

        $response->assertStatus(302);
    }

    public function testAdicionarComentario()
    {
        $user = User::find(1);

        $comentario = factory('App\Comentario')->make();

        $response = $this->actingAs($user)
            ->post('/evento/1/comentarios/add', ['texto' => $comentario->texto]);

        $response->assertStatus(302)
            ->assertRedirect('/evento/1/comentarios')
            ->assertSessionHas('success', 'Comentario adicionado com sucesso');
    }
}
