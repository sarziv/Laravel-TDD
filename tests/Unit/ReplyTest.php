<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function isHasAnOwner()
    {
        $reply = factory('App\Reply')->create();
        $this -> assertInstanceOf('App\User', $reply->owner);
    }
}
