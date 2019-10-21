<?php

namespace Tests\Unit;

use App\Promocao;
use App\Validator\PromocaoValidator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PromocaoTest extends TestCase
{
    public function testDadosCorretos()
    {
        $promocao = new Promocao();
        $promocao = factory(Promocao::class)->make();

        PromocaoValidator::validate($promocao->toArray());

        $this->assertTrue(true);
    }
}
