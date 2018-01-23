<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_comment_on_a_story()
    {
    	$faker = \Faker\Factory::create();
        $user = factory('App\User')->create();
        $story = factory('App\Story')->create();
        $body = $faker->paragraph;

        $this->post("/stories/comments", [
        	'user_id' => $user->id,
        	'story_id' => $story->id,
        	'body' => $body
        ]);

        $this->assertDatabaseHas('comments', [
        	'body' => $body
        ]);
    }

    /** @test */
    public function a_user_can_rate_a_story()
    {
	    $user = factory('App\User')->create();
        $story = factory('App\Story')->create();
        $score = '4';

        $this->post("/stories/ratings", [
        	'user_id' => $user->id,
        	'story_id' => $story->id,
        	'score' => $score
        ]);

        $this->assertDatabaseHas('ratings', [
        	'score' => $score
        ]);
    }
}
