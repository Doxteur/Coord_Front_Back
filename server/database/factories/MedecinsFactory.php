<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medecins>
 */
class MedecinsFactory extends Factory
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
            'nom' => $this->faker->name,
            'prenom' => $this->faker->name,
            'specialite' => $this->faker->name,
            'adresse' => $this->faker->name,
            'tel' => $this->faker->name,
            'email' => $this->faker->name,

        ];
    }
}
