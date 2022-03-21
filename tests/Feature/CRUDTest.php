<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class CRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ranking_loser_and_winner_returns_200_status()
    {
        $user = User::factory()->make();
        $user = Passport::actingAs($user);

        $response = $this->get(route('loser'), ['Accept' => 'application/json']);
        $response->assertStatus(200);

        $response = $this->get(route('winner'), ['Accept' => 'application/json']);
        $response->assertStatus(200);
    }

    /** @test */
    public function ranking_loser_and_winner_returns_200_and_expected_user_JSON()
    {
        $admin = User::factory()->make();
        $admin = Passport::actingAs($admin, ['administrate']);

        $users = User::factory(10)->create();

        foreach ($users as $user) {
            $response = $this->post(route('play', $user->id), ['Accept' => 'application/json']);
        }

        $response = $this->get(route('loser'), ['Accept' => 'application/json']);

        // var_dump($response->json());

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'loser' => [
                'id',
                'nickname',
                'email',
                'is_admin',
                'created_at',
                'updated_at',
                'winning_percentage'
            ]
        ]);

        $response->assertStatus(200);
        $response = $this->get(route('winner'), ['Accept' => 'application/json']);

        $response->assertJsonStructure([
            'winner' => [
                'id',
                'nickname',
                'email',
                'is_admin',
                'created_at',
                'updated_at',
                'winning_percentage'
            ]
        ]);
    }

    /** @test */
    public function get_all_players_returns_200_and_users()
    {
        $admin = User::factory()->make();
        $admin = Passport::actingAs($admin, ['administrate']);

        User::factory(10)->create();

        $response = $this->get(route('players'), ['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            [
                'id',
                'nickname',
                'email',
                'is_admin',
                'created_at',
                'updated_at',
                'winning_percentage'
            ]
        ]);
    }

    /** @test */
    public function get_all_players_returns_403_if_user_is_not_admin()
    {
        $user = User::factory()->make();
        $user = Passport::actingAs($user);

        User::factory(10)->create();

        $response = $this->get(route('players'), ['Accept' => 'application/json']);
        $response->assertStatus(403);
    }

    /** @test */
    public function play_game_returns_200_and_expected_json_result()
    {
        $user = User::factory()->create();
        $user = Passport::actingAs($user);

        $response = $this->post(route('play', $user->id), ['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'result' => [
                'black_dice',
                'red_dice',
                'result',
                'updated_at',
                'created_at',
                'id'
            ]
        ]);
    }

    /** @test */
    public function ranking_returns_winning_percentage_and_200(){
        $admin = User::factory()->make();
        $admin = Passport::actingAs($admin, ['administrate']);

        $users = User::factory(10)->create();

        foreach ($users as $user) {
            $response = $this->post(route('play', $user->id), ['Accept' => 'application/json']);
        }

        $response = $this->get(route('ranking'), ['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'winning_percentage'
        ]);
    }

    /** @test */
    public function ranking_returns_403_if_not_admin(){
        $user = User::factory()->make();
        $user = Passport::actingAs($user);

        $response = $this->get(route('ranking'), ['Accept' => 'application/json']);
        $response->assertStatus(403);
    }
}
