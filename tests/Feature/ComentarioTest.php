<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;

class ComentarioTest extends TestCase
{
    // EVENTOS

    public function testTelaComentariosEvento()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->get('/comentarios/evento/1');

        $response->assertStatus(200)
            ->assertSee('Comentarios');
    }

    public function testAdicionarComentarioEvento()
    {
        $user = User::find(1);

        $comentario = factory('App\Comentario')->make();

        $response = $this->actingAs($user)
            ->post('/comentarios/evento/1/add', ['texto' => $comentario->texto]);

        $response->assertStatus(302)
            ->assertRedirect('/comentarios/evento/1')
            ->assertSessionHas('success', 'Comentario adicionado com sucesso');
    }

    // ESTABELECIMENTOS
    
    public function testTelaComentariosEstabelecimento()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->get('/comentarios/estabelecimento/1');

        $response->assertStatus(200)
            ->assertSee('Comentarios');
    }

    public function testAdicionarComentarioEstabelecimento()
    {
        $user = User::find(1);

        $comentario = factory('App\Comentario')->make();

        $response = $this->actingAs($user)
            ->post('/comentarios/estabelecimento/1/add', ['texto' => $comentario->texto]);

        $response->assertStatus(302)
            ->assertRedirect('/comentarios/estabelecimento/1')
            ->assertSessionHas('success', 'Comentario adicionado com sucesso');
    }

    // ATRACOES

    public function testTelaComentariosAtracao()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->get('/comentarios/atracao/1');

        $response->assertStatus(200)
            ->assertSee('Comentarios');
    }

    public function testAdicionarComentarioAtracao()
    {
        $user = User::find(1);

        $comentario = factory('App\Comentario')->make();

        $response = $this->actingAs($user)
            ->post('/comentarios/atracao/1/add', ['texto' => $comentario->texto]);

        $response->assertStatus(302)
            ->assertRedirect('/comentarios/atracao/1')
            ->assertSessionHas('success', 'Comentario adicionado com sucesso');
    }

    // GERAL

    public function testTelaComentariosSemEstarLogado()
    {
        $response = $this
            ->get('/comentarios/evento/1');

        $response->assertStatus(302);
    }

    public function testAdicionarComentarioSemEstarLogado()
    {
        $user = User::find(1);

        $comentario = factory('App\Comentario')->make();

        $response = $this
            ->post('/comentarios/evento/1/add', ['texto' => $comentario->texto]);

        $response->assertStatus(302);
    }
}
