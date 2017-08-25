<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{

    use DatabaseMigrations;

    protected $thread;
    /** @test */
    public function setUp ()
    {
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function ThreadHasReplies ()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /** @test */
    public function ThreadHasACreator ()
    {
        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

    /** @test */
    public function ThreadCanAddReply ()
    {
        $this->thread->addReply([
           'body' => 'FooBar',
            'user_id' => 1
        ]);

        $this->assertCount(1,$this->thread->replies);
    }
}
