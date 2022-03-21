<?php

namespace Tests\Feature;

use Tests\TestCase;

class FailedRoutesTest extends TestCase
{
   /** @test */
   public function login_returns_http_bad_request()
   {
       $response = $this->post(route('login'), []);

       $response->assertStatus(400);
   }

   /** @test */
   public function register_returns_http_bad_request()
   {
       $response = $this->post(route('register'), []);

       $response->assertStatus(400);
   }

   /** @test */
   public function get_users_returns_http_401_without_token()
   {
       $response = $this->get(route('players'), ['Accept' => 'application/json']);

       $response->assertStatus(401);
   }

   /** @test */
   public function update_player_returns_http_401_without_token()
   {
       $response = $this->put(route('update.player', 1), [],['Accept' => 'application/json']);

       $response->assertStatus(401);
   }

   /** @test */
   public function delete_throws_returns_http_401_without_token()
   {
       $response = $this->delete(route('delete.throws', 1), [], ['Accept' => 'application/json']);

       $response->assertStatus(401);
   }

   /** @test */
   public function play_returns_http_401_without_token()
   {
       $response = $this->post(route('play', 1), [], ['Accept' => 'application/json']);

       $response->assertStatus(401);
   }

   /** @test */
   public function get_all_throws_returns_http_401_without_token()
   {
       $response = $this->get(route('all.throws', 1), ['Accept' => 'application/json']);

       $response->assertStatus(401);
   }

   /** @test */
   public function ranking_returns_http_401_without_token()
   {
       $response = $this->get(route('ranking'), ['Accept' => 'application/json']);

       $response->assertStatus(401);
   }

   /** @test */
   public function ranking_loser_returns_http_401_without_token()
   {
       $response = $this->get(route('loser'), ['Accept' => 'application/json']);

       $response->assertStatus(401);
   }

   /** @test */
   public function ranking_winner_returns_http_401_without_token()
   {
       $response = $this->get(route('winner'), ['Accept' => 'application/json']);

       $response->assertStatus(401);
   }
}
