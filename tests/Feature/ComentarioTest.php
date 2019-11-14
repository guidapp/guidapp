<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;
use App\Evento;

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

    // PRATOS

    public function testTelaComentariosPrato()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->get('/comentarios/prato/1');

        $response->assertStatus(200)
            ->assertSee('Comentarios');
    }

    public function testAdicionarComentarioPrato()
    {
        $user = User::find(1);

        $comentario = factory('App\Comentario')->make();

        $response = $this->actingAs($user)
            ->post('/comentarios/prato/1/add', ['texto' => $comentario->texto]);

        $response->assertStatus(302)
            ->assertRedirect('/comentarios/prato/1')
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

    public function testResponderComentario()
    {
        $user = User::find(1);

        $evento = factory('App\Evento')->create(['user_id' => 1]);

        $comentario = factory('App\Comentario')->create([
            'comentarioable_id' => $evento->id,
            'comentarioable_type' => 'App\Evento']);

        $resposta = factory('App\Comentario')->make();

        $response = $this->actingAs($user)
            ->post('/comentarios/responder/'.$comentario->id, ['texto' => $resposta->texto]);
        
        $response->assertStatus(302)
            ->assertRedirect('/comentarios/evento/'.$evento->id)
            ->assertSessionHas('success', 'Resposta adicionada com sucesso');
    }

    public function testResponderComentarioDeOutroOrganizador()
    {
        $user = User::find(1);

        $evento = factory('App\Evento')->create(['user_id' => 2]);

        $comentario = factory('App\Comentario')->create([
            'comentarioable_id' => $evento->id,
            'comentarioable_type' => 'App\Evento']);

        $resposta = factory('App\Comentario')->make();

        $response = $this->actingAs($user)
            ->post('/comentarios/responder/'.$comentario->id, ['texto' => $resposta->texto]);
        
        $response->assertStatus(403);
    }

    public function testMostrarRespostasNaoLidasDeComentarios()
    {
        $user = factory('App\User')->create();

        $evento = Evento::find(1);

        $comentario = factory('App\Comentario')->create([
            'comentarioable_id' => $evento->id,
            'comentarioable_type' => 'App\Evento',
            'user_id' => $user->id]);
        
        $resposta = factory('App\Comentario')->create([
            'comentarioable_id' => $evento->id,
            'comentarioable_type' => 'App\Evento',
            'comentario_id' => $comentario->id,
            'user_id' => $evento->organizador->id]);
        
        $response = $this->actingAs($user)
            ->get(route('comentarios'));
        
        $response->assertStatus(200)
            ->assertSee($evento->nome)
            ->assertSee('1 resposta não lida');
    }

    public function testMostrarComentariosNaoLidos()
    {
        $user = factory('App\User')->create();

        $evento = factory('App\Evento')->create([
            'user_id' => $user->id]);

        $comentario = factory('App\Comentario')->create([
            'comentarioable_id' => $evento->id,
            'comentarioable_type' => 'App\Evento',
            'user_id' => 1]);
        
        $response = $this->actingAs($user)
            ->get(route('comentarios'));
        
        $response->assertStatus(200)
            ->assertSee($evento->nome)
            ->assertSee('1 comentário não lido');
    }

    public function testMarcarComentariosComoLidos()
    {
        $user = factory('App\User')->create();

        $evento = factory('App\Evento')->create([
            'user_id' => $user->id]);

        $comentario = factory('App\Comentario')->create([
            'comentarioable_id' => $evento->id,
            'comentarioable_type' => 'App\Evento',
            'user_id' => 1]);
        
        // ler os comentarios
        $this->actingAs($user)->get('/comentarios/evento/'.$evento->id);
        
        $response = $this->actingAs($user)
            ->get(route('comentarios'));
        
        $response->assertStatus(200)
            ->assertSee('0 comentários não lidos');
    }
}
