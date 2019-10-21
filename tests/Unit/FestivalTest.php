<?php

namespace Tests\Unit;

use App\Festival;
use App\Validator\FestivalValidator;
use App\Validator\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FestivalTest extends TestCase
{
    public function testDadosCorretos()
    {
        $festival = new Festival();
        $festival = factory(Festival::class)->make();

        FestivalValidator::validate($festival->toArray());

        $this->assertTrue(true);
    }
}
