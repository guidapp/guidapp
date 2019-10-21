<?php

namespace Tests\Unit;

use App\Tag;
use App\Validator\TagValidator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    public function testDadosCorretos()
    {
        $tag = new Tag();
        $tag = factory(Tag::class)->make();

        TagValidator::validate($tag->toArray());

        $this->assertTrue(true);
    }
}
