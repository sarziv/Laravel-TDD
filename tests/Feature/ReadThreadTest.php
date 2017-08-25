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

        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }


    /** @test */
    public function canBrowseThread ()
    {

        $response = $this->get('/threads')

        ->assertSee($this->thread->title);

    }

    /** @test */
    public function canBrowseSingleThread ()
    {


        $response = $this->get('/threads/' . $this->thread->id)

       ->assertSee($this->thread->title);
    }

    /** @test */
    public function canUserReadReplayAssociatedWithThread ()
    {
        $replay = factory('App\Reply')->create(['thread_id' => $this->thread->id ]);

        $this->get('/threads/' . $this->thread->id)

        ->assertSee($replay->body);
    }
}
