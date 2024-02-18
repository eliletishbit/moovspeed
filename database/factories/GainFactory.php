<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gain>
 */
class GainFactory extends Factory
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
            'gains_en_cours' => fake()->randomFloat(2,10,1000),
            'gains_total'=> fake()->randomFloat(2,10,1000)
        ];
    }
}
