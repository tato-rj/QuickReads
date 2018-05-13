<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RatingTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_rate_a_story()
    {
    	$user = $this->register();
        $story = factory('App\Story')->create();

    	$this->post('/quickreads/stories/ratings', [
    		'facebook_id' => $user->getData()->facebook_id,
    		'title' => $story->title,
    		'score' => 4
    	])->assertJson(['rating' => 4]);

    	$this->assertDatabaseHas('ratings', ['score' => 4]);
    }
}
