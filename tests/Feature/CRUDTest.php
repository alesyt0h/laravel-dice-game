<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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

}
