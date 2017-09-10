<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_Has_An_Owner()
    {
        /*create thread*/
        $reply = create('App\Reply');

        /*Asserts that a variable is of a given type.*/
        $this -> assertInstanceOf('App\User', $reply->owner);
    }
}
