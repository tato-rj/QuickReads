<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function the_admin_can_add_a_new_author()
    {
        $input = factory('App\Author')->make();

        $this->post('/authors', $input->toArray())
            ->assertSessionHas('success');

        $this->assertDatabaseHas('authors', [
            'name' => $input->name
        ]);
    }

    /** @test */
    public function the_admin_can_edit_an_author()
    {
        $author = factory('App\Author')->create();

        $this->patch('/authors/'.$author->slug, [
            'name' => 'New name',
            'life' => $author->life,
            'died_in' => $author->died_in,
            'born_in' =>$author->born_in
        ])->assertSessionHas('success');

        $this->assertDatabaseHas('authors', [
            'name' => 'New name'
        ])->assertDatabaseMissing('authors', [
            'name' => $author->name
        ]);
    }
}
