<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReadThreadTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function setUp ()
    {
        /*Setup for thread multiple use/clean up*/
        parent::setUp();

        $this->thread = create('App\Thread');
    }


    /** @test */
    public function can_Browse_Thread ()
    {
        /*Looking for responce if can see thread */
        $response = $this->get('/threads')
            ->assertSee($this->thread->title);

    }

    /** @test */
    public function can_Browse_Single_Thread ()
    {
        /*Looking for responce if can see thread single post*/
        $response = $this->get($this->thread->path())
            ->assertSee($this->thread->title);

    }

    /** @test */
    public function can_User_Read_Replay_Associated_With_Thread ()
    {
        /*Create a reply for thread and test if you can read it*/
        $replay = factory('App\Reply')->create(['thread_id' => $this->thread->id]);


        $this->get($this->thread->path())
            ->assertSee($replay->body);
    }
}
