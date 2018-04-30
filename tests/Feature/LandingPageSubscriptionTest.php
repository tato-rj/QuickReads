<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LandingPageSubscriptionTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_visitor_can_submit_their_email()
    {
    	$this->post('piano-lit/subscribe', ['email' => 'test@email.com']);

    	$this->assertDatabaseHas('subscriptions', ['email' => 'test@email.com']);
    }
}
