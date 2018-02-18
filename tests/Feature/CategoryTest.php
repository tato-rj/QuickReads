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
        $this->be(factory('App\User')->make());
        
        $input = factory('App\Category')->make();

        $this->post('/quickreads/categories', $input->toArray())
            ->assertSessionHas('success');

        $this->assertDatabaseHas('categories', [
            'category' => $input->category
        ]);
    }


    /** @test */
    public function the_admin_can_edit_a_category()
    {
        $this->be(factory('App\User')->make());
        
        $category = factory('App\Category')->create();

        $this->patch('/quickreads/categories/'.$category->slug, [
            'category' => 'New name'
        ])->assertSessionHas('success');

        $this->assertDatabaseHas('categories', [
            'category' => 'New name'
        ])->assertDatabaseMissing('categories', [
            'category' => $category->category
        ]);
    }

    /** @test */
    public function the_admin_can_remove_a_category()
    {
        $this->be(factory('App\User')->make());
        
        $category = factory('App\Category')->create();

        $this->delete('/quickreads/categories/'.$category->slug)->assertSessionHas('success');

        $this->assertDatabaseMissing('categories', [
            'category' => $category->category
        ]);
    }
}
