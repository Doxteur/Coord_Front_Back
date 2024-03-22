<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maladies>
 */
class MaladiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'categorie' => $this->faker->word,
            'gravite' => $this->faker->word,
            'autres' => $this->faker->word,
        ];
    }
}
