<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RatingTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function a_story_knows_the_average_rating()
	{
		$story = factory('App\Story')->create();
		factory('App\Rating')->create(['story_id' => $story->id, 'score' => 4]);
		factory('App\Rating')->create(['story_id' => $story->id, 'score' => 3]);
		factory('App\Rating')->create(['story_id' => $story->id, 'score' => 5]);

		$this->assertEquals(4, $story->fresh()->averageRating());
	}

	/** @test */
	public function a_story_rating_returns_integers_only()
	{
		$story = factory('App\Story')->create();
		factory('App\Rating')->create(['story_id' => $story->id, 'score' => 4]);
		factory('App\Rating')->create(['story_id' => $story->id, 'score' => 4]);
		factory('App\Rating')->create(['story_id' => $story->id, 'score' => 5]);

		$this->assertEquals(4, $story->fresh()->averageRating());
	}
}
