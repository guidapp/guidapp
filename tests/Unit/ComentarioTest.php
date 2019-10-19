<?php

namespace Tests\Unit;

use App\Comentario;
use App\Validator\ComentarioValidator;
use App\Validator\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComentarioTest extends TestCase
{
    public function testDadosCorretos()
    {
        $comentario = new Comentario();
        $comentario = factory(\App\Comentario::class)->make();

        ComentarioValidator::validate($comentario->toArray());

        $this->assertTrue(true);
    }
}
