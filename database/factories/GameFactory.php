<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(1, 10),
            'player_id' => $this->faker->numberBetween(1, 10),
            'black_dice' => $this->faker->numberBetween(1, 6),
            'red_dice' => $this->faker->numberBetween(1, 6),
            'result' => $this->faker->randomElement(['win','lost'])
        ];
    }
}
