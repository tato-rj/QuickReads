<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function the_admin_can_add_a_new_category()
    {
        $input = factory('App\Category')->make();

        $this->post('/categories', $input->toArray())
            ->assertSessionHas('success');

        $this->assertDatabaseHas('categories', [
            'name' => $input->name
        ]);
    }


    /** @test */
    public function the_admin_can_edit_a_category()
    {
        $category = factory('App\Category')->create();

        $this->patch('/categories/'.$category->slug, [
            'name' => 'New name'
        ])->assertSessionHas('success');

        $this->assertDatabaseHas('categories', [
            'name' => 'New name'
        ])->assertDatabaseMissing('categories', [
            'name' => $category->name
        ]);
    }

    /** @test */
    public function the_admin_can_remove_a_category()
    {
        $category = factory('App\Category')->create();

        $this->delete('/categories/'.$category->slug)->assertSessionHas('success');

        $this->assertDatabaseMissing('categories', [
            'name' => $category->name
        ]);
    }
}
