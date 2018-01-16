<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function the_app_can_access_all_stories()
    {
        $story = factory('App\Story')->create();

        $response = $this->get('/stories');
        $response->assertSee($story->title);
    }

    /** @test */
    public function the_admin_can_add_a_new_story()
    {
        $input = factory('App\Story')->make();

        $this->post('/stories', $input->toArray());
        $this->assertDatabaseHas('stories', [
            'title' => $input->title
        ]);
    }

    /** @test */
    public function the_admin_can_add_a_new_author()
    {
        $input = factory('App\Author')->make();

        $this->post('/authors', $input->toArray());
        $this->assertDatabaseHas('authors', [
            'name' => $input->name
        ]);
    }

    /** @test */
    public function the_admin_can_add_a_new_category()
    {
        $input = factory('App\Category')->make();

        $this->post('/categories', $input->toArray());
        $this->assertDatabaseHas('categories', [
            'name' => $input->name
        ]);
    }
}
