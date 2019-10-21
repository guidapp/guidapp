<?php

namespace Tests\Unit;

use App\Imagem;
use App\Validator\ImagemValidator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImagemTest extends TestCase
{
    public function testDadosCorretos()
    {
        $imagem = new Imagem();
        $imagem = factory(Imagem::class)->make();

        ImagemValidator::validate($imagem->toArray());

        $this->assertTrue(true);
    }
}
