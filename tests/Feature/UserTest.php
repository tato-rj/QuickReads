<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function users_can_create_an_account()
	{
		$response = $this->post('/quickreads/users/register', [
			'first_name' => 'John',
			'last_name' => 'Doe',
			'email' => 'doe@email.com',
			'password' => 'secret'
		]);

		$this->assertDatabaseHas('users', [
			'email' => 'doe@email.com'
		]);

		// TO READ THE JSON RESPONSE, USE THE content() method
		// dd($response->content());
	}

	/** @test */
	public function users_cannot_create_an_account_with_an_existing_email()
	{
		$this->post('/quickreads/users', [
			'first_name' => 'John',
			'last_name' => 'Doe',
			'email' => 'doe@email.com',
			'password' => 'secret'
		])->assertStatus(200);

		$this->post('/quickreads/users', [
			'first_name' => 'Jane',
			'last_name' => 'Smith',
			'email' => 'doe@email.com',
			'password' => 'password'
		])->assertStatus(403);
	}

	// /** @test */
	// public function users_can_login_from_the_app()
	// {
	// 	$user = factory('App\User')->create();

	// 	$response = $this->get("/quickreads/app/login/{$user->email}/secret");

	// 	dd($response);
	// }
}
