<?php

namespace Tests\Browser;

use App\Estabelecimento;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
use App\Atracao;

class CadastrarEstabelecimentoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCadastroValido()
    {
        $this->browse(function (Browser $browser) {
            $estabelecimento = factory(Estabelecimento::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/cadastrarestabelecimento')
                    ->assertSee('Cadastrar Estabelecimento')
                    ->pause(1000)
                    ->type('nome', $estabelecimento->nome)
                    ->type('latitude', $estabelecimento->latitude)
                    ->type('longitude', $estabelecimento->longitude)
                    ->type('descricao', $estabelecimento->descricao)
                    ->type('telefone', $estabelecimento->telefone)
                    ->type('cidade', $estabelecimento->cidade)
                    ->pause(1000)
                    ->press('Cadastrar')
                    ->pause(1000)
                    ->assertSee('Estabelecimentos')
                    ->assertSee($estabelecimento->nome);
        });
    }

    public function testCadastroSemNome()
    {
        $this->browse(function (Browser $browser) {
            $estabelecimento = factory(Estabelecimento::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/cadastrarestabelecimento')
                    ->assertSee('Cadastrar Estabelecimento')
                    ->pause(1000)
                    ->type('nome', '')
                    ->type('latitude', $estabelecimento->latitude)
                    ->type('longitude', $estabelecimento->longitude)
                    ->type('descricao', $estabelecimento->descricao)
                    ->type('telefone', $estabelecimento->telefone)
                    ->type('cidade', $estabelecimento->cidade)
                    ->pause(1000)
                    ->press('Cadastrar')
                    ->pause(1000)
                    ->assertSee('O campo nome é obrigatório');
        });
    }

    public function testCadastroSemLatitude()
    {
        $this->browse(function (Browser $browser) {
            $estabelecimento = factory(Estabelecimento::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/cadastrarestabelecimento')
                    ->assertSee('Cadastrar Estabelecimento')
                    ->pause(1000)
                    ->type('nome', $estabelecimento->nome)
                    ->type('latitude', '')
                    ->type('longitude', $estabelecimento->longitude)
                    ->type('descricao', $estabelecimento->descricao)
                    ->type('telefone', $estabelecimento->telefone)
                    ->type('cidade', $estabelecimento->cidade)
                    ->pause(1000)
                    ->press('Cadastrar')
                    ->pause(1000)
                    ->assertSee('O campo latitude é obrigatório');
        });
    }

    public function testCadastroSemLongitude()
    {
        $this->browse(function (Browser $browser) {
            $estabelecimento = factory(Estabelecimento::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/cadastrarestabelecimento')
                    ->assertSee('Cadastrar Estabelecimento')
                    ->pause(1000)
                    ->type('nome', $estabelecimento->nome)
                    ->type('latitude', $estabelecimento->latitude)
                    ->type('longitude', '')
                    ->type('descricao', $estabelecimento->descricao)
                    ->type('telefone', $estabelecimento->telefone)
                    ->type('cidade', $estabelecimento->cidade)
                    ->pause(1000)
                    ->press('Cadastrar')
                    ->pause(1000)
                    ->assertSee('O campo longitude é obrigatório');
        });
    }

    public function testCadastroSemDescricao()
    {
        $this->browse(function (Browser $browser) {
            $estabelecimento = factory(Estabelecimento::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/cadastrarestabelecimento')
                    ->assertSee('Cadastrar Estabelecimento')
                    ->pause(1000)
                    ->type('nome', $estabelecimento->nome)
                    ->type('latitude', $estabelecimento->latitude)
                    ->type('longitude', $estabelecimento->longitude)
                    ->type('descricao', null)
                    ->type('telefone', $estabelecimento->telefone)
                    ->type('cidade', $estabelecimento->cidade)
                    ->pause(1000)
                    ->press('Cadastrar')
                    ->pause(1000)
                    ->assertSee('O campo descricao é obrigatório');
        });
    }

    public function testCadastroSemTelefone()
    {
        $this->browse(function (Browser $browser) {
            $estabelecimento = factory(Estabelecimento::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/cadastrarestabelecimento')
                    ->assertSee('Cadastrar Estabelecimento')
                    ->pause(1000)
                    ->type('nome', $estabelecimento->nome)
                    ->type('latitude', $estabelecimento->latitude)
                    ->type('longitude', $estabelecimento->longitude)
                    ->type('descricao', $estabelecimento->telefone)
                    ->type('telefone', '')
                    ->type('cidade', $estabelecimento->cidade)
                    ->pause(1000)
                    ->press('Cadastrar')
                    ->pause(1000)
                    ->assertSee('O campo telefone é obrigatório');
        });
    }

    public function testCadastroSemCidade()
    {
        $this->browse(function (Browser $browser) {
            $estabelecimento = factory(Estabelecimento::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/cadastrarestabelecimento')
                    ->assertSee('Cadastrar Estabelecimento')
                    ->pause(1000)
                    ->type('nome', $estabelecimento->nome)
                    ->type('latitude', $estabelecimento->latitude)
                    ->type('longitude', $estabelecimento->longitude)
                    ->type('descricao', $estabelecimento->telefone)
                    ->type('telefone', $estabelecimento->cidade)
                    ->type('cidade', '')
                    ->pause(1000)
                    ->press('Cadastrar')
                    ->pause(1000)
                    ->assertSee('O campo cidade é obrigatório');
        });
    }
}
