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
        $user = factory('App\User')->create();
        $story = factory('App\Story')->create();
        $comment = 'New comment';

        // THIS WILL FAIL BECAUSE THE APP SENDS THE FACEBOOK_ID AND IN THIS TEST I AM SENDING THE USER ID

        $this->post("/quickreads/stories/comments", [
        	'facebook_id' => $user->facebook_id,
        	'title' => $story->title,
        	'body' => 'New comment'
        ]);

        $this->assertDatabaseHas('comments', [
        	'body' => 'New comment'
        ]);
    }

    /** @test */
    public function a_user_can_rate_a_story()
    {
	    $user = factory('App\User')->create();
        $story = factory('App\Story')->create();
        $score = '4';

        $this->post("/quickreads/stories/ratings", [
        	'facebook_id' => $user->facebook_id,
        	'title' => $story->title,
        	'score' => $score
        ]);

        $this->assertDatabaseHas('ratings', [
        	'score' => $score
        ]);
    }

    /** @test */
    public function a_user_can_sign_up_with_facebook()
    {
        $user = factory('App\User')->make();

        $this->post("/quickreads/users/facebook", [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'gender' => $user->gender,
            'email' => $user->email,
            'facebook_id' => $user->facebook_id,
            'locale' => $user->locale
        ]);

        $this->assertDatabaseHas('users', [
            'slug' => str_slug("{$user->first_name} {$user->last_name}")
        ]);
    }
}
