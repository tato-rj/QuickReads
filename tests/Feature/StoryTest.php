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
    public function the_admin_can_add_a_new_story()
    {
        $input = factory('App\Story')->make();

        $this->post('/stories', $input->toArray())
            ->assertSessionHas('success');

        $this->assertDatabaseHas('stories', [
            'title' => $input->title
        ]);
    }

    /** @test */
    public function the_admin_can_edit_a_story()
    {
        $story = factory('App\Story')->create();

        $this->patch('/stories/'.$story->slug, [
            'title' => 'New title',
            'content' => $story->content,
            'summary' => $story->summary,
            'reading_time' =>$story->reading_time,
            'author_id' => $story->author_id,
            'category_id' => $story->category_id,
            'cost' => $story->cost
        ])->assertSessionHas('success');

        $this->assertDatabaseHas('stories', [
            'title' => 'New title'
        ])->assertDatabaseMissing('stories', [
            'title' => $story->title
        ]);
    }

    /** @test */
    public function the_admin_can_remove_a_story()
    {
        $story = factory('App\Story')->create();

        $this->delete('/stories/'.$story->slug)->assertSessionHas('success');

        $this->assertDatabaseMissing('stories', [
            'title' => $story->title
        ]);
    }
}
