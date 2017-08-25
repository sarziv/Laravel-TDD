<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInForum extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function Auth_User_May_Not_Add_Replies() {

        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads/1/replies',[]);

    }


    /** @test */
    public function Auth_User_Only()
    {

        $this->be($user = factory('App\User')->create());


        $thread = factory('App\Thread')->create();


        $reply = factory('App\Reply')->make();
        $this->post($thread ->path() . '/replies' , $reply ->toArray());

        $this->get($thread->path())
            ->assertSee($reply -> body);

    }

}
