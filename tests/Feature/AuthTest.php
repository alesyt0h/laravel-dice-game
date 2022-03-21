<?php

namespace Tests\Feature;

use App\Models\User;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\ClientRepository;
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

    /** @test */
    public function login_is_successful_and_returns_expected_json()
    {
        $user = User::factory()->make();

        $this->createAccessClient();

        $this->post(route('register'), [
            'email' => $user->email,
            'password' => $user->password
        ], ['Accept' => 'application/json']);

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => $user->password
        ], ['Accept' => 'application/json']);

        // var_dump($response->json());

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'user' => [
                'created_at',
                'updated_at',
                'email',
                'id',
                'is_admin',
                'nickname'
            ],
            'access_token'
        ]);
    }

    /** @test */
    public function login_returns_unauthorized_and_error_message_on_failed_credentials()
    {
        $response = $this->post(route('login'), [
            'email' => 'notanemail',
            'password' => '123'
        ], ['Accept' => 'application/json']);

        $response->status(401);
        $response->assertJsonFragment([
            'message' =>
                'Invalid user or password'

        ]);
    }

    public function createAccessClient(){
        $clientRepository = new ClientRepository();
        $client = $clientRepository->createPersonalAccessClient(
            null, 'Test Personal Access Client', 'http://localhost'
        );

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => $client->id,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}

