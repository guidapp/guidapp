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
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSemNome() {
        $user = factory(User::class,1)->create();
        //$user->name = null;
        //->actingAs($user, 'guest')
        /*
        
                'name' => $user->name,
                'surname' => $user->surname,
                'email' => $user->email,
                'password' => $user->password,
                'cpf' => $user->cpf,

                public function testBasicTest()
                {
                    $response = $this->get('/');

                    $response->assertStatus(200);
                }
         */


    }
}
