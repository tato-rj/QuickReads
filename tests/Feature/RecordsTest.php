<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RecordsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function records_when_a_user_buys_a_story()
    {
    	$user = factory('App\User')->create();
    	$story = factory('App\Story')->create();

    	$this->post("/quickreads/app/records/purchase", [
    		'facebook_id' => $user->facebook_id,
    		'title' => $story->title   		
    	]);

    	$this->assertDatabaseHas('user_purchase_records', [
    		'user_id' => $user->id,
    		'story_id' => $story->id
    	]);
    }

    /** @test */
    public function a_story_keeps_track_of_the_number_of_views()
    {
    	$story = factory('App\Story')->create();

    	$this->assertEquals(0, $story->views);

    	$this->post('/quickreads/app/stories/views', [
    		'title' => $story->title
    	]);

    	$this->assertEquals(1, $story->fresh()->views);
    }
}
