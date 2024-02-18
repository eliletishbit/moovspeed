<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'lieudep' => fake()->sentence(),
            'lieudest' => fake()->sentence(),
            'dateHeureDem' => now(),
            'status' => fake()->boolean(),

        ];
    }
}
