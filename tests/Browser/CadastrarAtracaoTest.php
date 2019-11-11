<?php

namespace Tests\Browser;

use App\Atracao;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CadastrarAtracaoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCadastroValido()
    {
        $this->browse(function (Browser $browser) {
            $atracao = factory(Atracao::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/cadastraratracao')
                    ->assertSee('Nome')
                    ->type('nome', $atracao->nome)
                    ->type('descricao', $atracao->descricao)
                    ->pause(2000)
                    ->press('submit');
        });
    }
}
