<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function register_saves_user_in_db()
    {
        $user = User::factory()->create();

        $this->post(route('register'), [
            'email' => $user->email,
            'password' => $user->password
        ], ['Accept' => 'application/json']);

        $this->assertDatabaseHas('users', [
            'email' => $user->email
        ]);
    }

    /** @test */
    public function register_returns_validations_error()
    {
        $response = $this->post(route('register'), [
            'nickname' => 'Imaverylongstring',
            'email' => 'notanemail',
            'password' => '123'
        ], ['Accept' => 'application/json']);

        $response->assertJsonFragment([
            'errors' => [
                'email' => [
                    'The email must be a valid email address.'
                ],
                'nickname' => [
                    'The nickname must not be greater than 15 characters.'
                ],
                'password' => [
                    'The password must be at least 8 characters.'
                ]
            ]
        ]);
    }

}

