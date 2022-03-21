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
}
