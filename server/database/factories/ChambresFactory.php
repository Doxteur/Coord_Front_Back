<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chambres>
 */
class ChambresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'numero' => $this->faker->numberBetween(1, 100),
            'etage' => $this->faker->numberBetween(1, 10),
            'nb_lits' => 10,
            'nb_lits_occupes' => $this->faker->numberBetween(1, 10),
        ];
    }
}
