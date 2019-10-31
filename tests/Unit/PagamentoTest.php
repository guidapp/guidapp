<?php

namespace Tests\Unit;

use App\Pagamento;
use App\User;
use App\VendaIngresso;
use App\Ingresso;
use App\Validator\PagamentoValidator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagamentoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $pagamento = new Pagamento();
        $pagamento = factory(Pagamento::class)->make();

        PagamentoValidator::validate($pagamento->toArray());

        $this->assertTrue(true);
    }

    public function testValorTotalPagamentoIngressos() {
        $ingressosVendidos = factory(VendaIngresso::class, 10)->make();
        $user = User::find(1);

        $pagamento = new Pagamento();
        $pagamento->gerarPagamento($user, $ingressosVendidos);

        $valorTotal = 0;
        foreach ($ingressosVendidos as $vendaIngresso) {
            $valorTotal += $vendaIngresso->ingresso->preco * (100-$vendaIngresso->ingresso->desconto) / 100;
        }

        $this->assertEquals($valorTotal, $pagamento->valor);
    }

    public function testNaoReducaoQuantidadeIngressosAntesPagamento()
    {
        $ingresso = factory(Ingresso::class)->create();

        $user = User::find(1);

        $ingressosVendidos = $ingresso->criarVenda($user, 2);

        $pagamento = new Pagamento;
        $pagamento->gerarPagamento($user, $ingressosVendidos);

        $this->assertEquals(0, $ingresso->quantidadeIngressosConfirmados());
    }

    public function testReducaoQuantidadeIngressosAposPagamento()
    {
        $ingresso = factory(Ingresso::class)->create();

        $user = User::find(1);

        $ingressosVendidos = $ingresso->criarVenda($user, 2);

        $pagamento = new Pagamento;
        $pagamento->gerarPagamento($user, $ingressosVendidos);

        $pagamento->confirmarPagamento('id do paypal');

        $this->assertEquals(2, $ingresso->quantidadeIngressosConfirmados());
    }

    // public function testIngressosDoUsuarioAposVenda()
    // {
    //     $ingresso = factory(Ingresso::class)->create();

    //     $user = User::find(1);

    //     $ingresso->criarVenda($user, 2);

    //     $qnt_ingressos_comprados = $user->compraIngressos->where('ingresso_id',$ingresso->id)->count();

    //     $this->assertEquals(2, $qnt_ingressos_comprados);
    // }
}
