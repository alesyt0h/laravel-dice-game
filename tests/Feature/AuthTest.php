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

}

