<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{

    use DatabaseMigrations;

    protected $thread;


    public function setUp ()
    {
        parent::setUp();
        $this->thread = create('App\Thread');
    }

    /** @test */
    public function test_can_thread_make_a_string ()
    {
        $thread = create('App\Thread');

        $this->assertEquals('/threads/' . $thread->channel->slug . '/' . $thread->id , $thread->path());
    }

    /** @test */
    public function Thread_Has_Replies ()
    {
        /*test if thread has replies*/
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /** @test */
    public function Thread_Has_A_Creator ()
    {
        /*test id thread has a creator*/
        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

    /** @test */
    public function Thread_Can_Add_Reply ()
    {
        /*add a reply to a thread and count should be 1*/
        $this->thread->addReply([
            'body' => 'FooBar',
            'user_id' => 1
        ]);
        $this->assertCount(1, $this->thread->replies);
    }

    /** @test */
    public function a_thread_belongs_to_a_channel ()
    {

        $thread = create('App\Thread');

        $this->assertInstanceOf('App\Channel', $thread->channel);
    }

}
