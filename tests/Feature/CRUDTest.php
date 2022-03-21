<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class CRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ranking_loser_and_winner_returns_200_and_expected_user_JSON()
    {
        $admin = User::factory()->make();
        $admin = Passport::actingAs($admin, ['administrate']);

        User::factory(10)->create();

        for ($i=0; $i < 10; $i++) {
            Game::factory(1)->create([
                'id' => $i + 1,
                'player_id' => $i + 1
            ]);
        }

        $response = $this->get(route('loser'), ['Accept' => 'application/json']);

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

    /** @test */
    public function get_all_throws_returns_200_and_expected_throws_JSON(){

        $user = User::factory()->create();
        $user = Passport::actingAs($user);

        for ($i=0; $i < 10; $i++) {
            Game::factory(1)->create([
                'id' => $i + 1,
                'player_id' => $user->id
            ]);
        }

        $response = $this->get(route('all.throws', $user->id), ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'throws' => [
                [
                    'id',
                    'player_id',
                    'black_dice',
                    'red_dice',
                    'result',
                    'updated_at',
                    'created_at'
                ]
            ]
        ]);
    }

    /** @test */
    public function delete_throws_deletes_correctly_in_db_and_status_200_and_gives_success_message_JSON(){

        $user = User::factory()->create();
        $user = Passport::actingAs($user);

        $throws = 10;

        for ($i=0; $i < $throws; $i++) {
            $games = Game::factory(1)->create([
                'id' => $i + 1,
                'player_id' => $user->id
            ]);
        }

        $response = $this->delete(route('delete.throws', $user->id), ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => 'Deleted ' . $throws . ' throws'
        ]);
        $this->assertDatabaseMissing('games', [
            'id' => $games[0]->id
        ]);
    }

    /** @test */
    public function delete_throws_returns_forbidden_if_not_the_same_user(){

        $user = User::factory()->create();
        $user = Passport::actingAs($user);

        for ($i=0; $i < 10; $i++) {
            Game::factory(1)->create([
                'id' => $i + 1,
                'player_id' => $user->id
            ]);
        }

        $response = $this->delete(route('delete.throws', $user->id + 1), ['Accept' => 'application/json']);

        $response->assertStatus(403);
    }

    /** @test */
    public function update_nickname_updates_correctly_and_200_and_returns_expected_JSON(){

        $newNickname = 'Juanito';

        $user = User::factory()->create();
        $user = Passport::actingAs($user);

        $response = $this->put(route('update.player', $user->id), [
            'nickname' => $newNickname
        ], ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJsonFragment([ 'message' => 'Updated the nickname correctly' ]);
        $response->assertJsonStructure([
            'user' => [
                'id',
                'nickname',
                'email',
                'is_admin',
                'created_at',
                'updated_at',
            ],
            'message'
        ]);
        $this->assertDatabaseHas('users', [
            'nickname' => $newNickname
        ]);
    }

    /** @test */
    public function update_nickname_returns_200_even_with_no_data(){

        $user = User::factory()->create();
        $user = Passport::actingAs($user);

        $response = $this->put(route('update.player', $user->id), [], ['Accept' => 'application/json']);

        $response->assertStatus(200);
    }

    /** @test */
    public function update_nickname_returns_forbidden_if_not_the_same_user(){

        $user = User::factory()->create();
        $user = Passport::actingAs($user);

        $response = $this->put(route('update.player', $user->id + 1), [
            'nickname' => 'Juanito Valderrama'
        ], ['Accept' => 'application/json']);

        $response->assertStatus(403);
    }

    /** @test */
    public function update_nickname_returns_409_and_your_nickname_is_same_msg(){

        $user = User::factory()->create();
        $user = Passport::actingAs($user);

        $response = $this->put(route('update.player', $user->id), [
            'nickname' => $user->nickname
        ], ['Accept' => 'application/json']);

        $response->assertStatus(409);
        $response->assertJsonFragment([
            'message' => 'You already have that nickname'
        ]);
    }

    /** @test */
    public function update_nickname_returns_error_msg_if_nickname_is_taken(){

        $users = User::factory(2)->create();
        Passport::actingAs($users[0]);

        $response = $this->put(route('update.player', $users[0]->id), [
            'nickname' => $users[1]->nickname
        ], ['Accept' => 'application/json']);

        $response->assertStatus(400);
        $response->assertJsonFragment([
            'error' => 'This nickname is already taken. Please choose another.'
        ]);
    }

}
