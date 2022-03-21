<?php

namespace Tests\Unit\app;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelpersTest extends TestCase
{
    use RefreshDatabase;

    public function test_calculate_wins_must_return_float()
    {
        $throws = Game::factory(10)->make();

        $throws = new \Illuminate\Database\Eloquent\Collection($throws);
        $percent = calculateWins($throws);

        $this->assertIsFloat($percent);
    }

    public function test_anonymous_setter_must_set_anonymous_if_nickname_is_empty_for_single_user()
    {
        $user = new \Illuminate\Database\Eloquent\Collection;

        $user->nickname = '';
        $user->email = 'pepe@example.com';
        $user->password = '123456';

        $returnedUser = anonymousSetter($user);

        $this->assertEquals('Anonymous', $returnedUser->nickname);
    }

    public function test_anonymous_setter_must_set_anonymous_if_nickname_is_empty_for_multiple_users()
    {
        $users = User::factory(10)->make();
        $users = new \Illuminate\Database\Eloquent\Collection($users);

        foreach ($users as $user) {
            $user->nickname = '';
        }

        anonymousSetter($users, false);

        $this->assertTrue($users->every('nickname', '===', 'Anonymous'));
    }
}
