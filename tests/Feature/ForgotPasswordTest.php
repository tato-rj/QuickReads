<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

class ForgotPasswordTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function a_user_can_request_a_password_reset_link_by_email()
	{
		$this->register('arthurvillar@gmail.com');

		$this->post('/quickreads/password/email', ['email' => 'arthurvillar@gmail.com'])
			 ->assertJson(['response' => 'An email has been sent to arthurvillar@gmail.com.']);
	}
}
