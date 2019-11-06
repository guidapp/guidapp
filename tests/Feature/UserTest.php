<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Como usuário, quero me cadastrar no sistema para gerenciar meu perfil
     */

    //C_01: Cadastro sem o nome
    public function testSemNome() {

        $user = factory(User::class)->make();
        $response = $this->post('register', [
            'name' => null,
            'surname' => $user->surname,
            'email' => $user->email,
            'password' => $user->password,
            'password_confirmation' => $user->password,
            'cpf' => null,
        ]);

        //$response->assertRedirect(route('register'))->assertSee('Register');

        $registered_user = User::where('email', $user->email)->where('name', $user->name)->first();
        $this->assertNull($registered_user);

        //$this->assertAuthenticatedAs($registered_user);
    }

    //C_02: Cadastro sem sobrenome
    public function testSemSobrenome() {

        $user = factory(User::class)->make();
        $response = $this->post('register', [
            'name' => $user->name,
            'surname' => null,
            'email' => $user->email,
            'password' => $user->password,
            'password_confirmation' => $user->password,
            'cpf' => null,
        ]);

        $response->assertRedirect(route('home'));

        $registered_user = User::where('email', $user->email)->where('name', $user->name)->first();
        $this->assertNotNull($registered_user);

        $this->assertAuthenticatedAs($registered_user);
    }

    //C_03: Cadastro sem e-mail
    public function testSemEmail() {

        $user = factory(User::class)->make();
        $response = $this->post('register', [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => null,
            'password' => $user->password,
            'password_confirmation' => $user->password,
            'cpf' => null,
        ]);

        $registered_user = User::where('email', $user->email)->where('name', $user->name)->first();
        $this->assertNull($registered_user);
    }

    //C_04: Cadastro sem senha
    public function testSemSenha() {

        $user = factory(User::class)->make();
        $response = $this->post('register', [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'password' => null,
            'password_confirmation' => null,
            'cpf' => null,
        ]);

        $registered_user = User::where('email', $user->email)->where('name', $user->name)->first();
        $this->assertNull($registered_user);
    }

    //C_05: Cadastro com todas as informações
    public function testDadosCompletos() {

        $user = factory(User::class)->make();
        $response = $this->post('register', [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'password' => $user->password,
            'password_confirmation' => $user->password,
            'cpf' => null,
        ]);

        $response->assertRedirect(route('home'));

        $registered_user = User::where('email', $user->email)->where('name', $user->name)->first();
        $this->assertNotNull($registered_user);

        $this->assertAuthenticatedAs($registered_user);
    }
}
