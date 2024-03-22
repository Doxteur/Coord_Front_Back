<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
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
            'age' => $this->faker->numberBetween(1, 100),
            'adresse' => $this->faker->address,
            'tel' => $this->faker->phoneNumber,
            'diagnostic' => $this->faker->sentence,
            'uuid' => $this->faker->uuid,
            'maladie_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
