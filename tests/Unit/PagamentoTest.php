<?php

namespace Tests\Unit;

use App\Pagamento;
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
}
