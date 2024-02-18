<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bienimmobilier>
 */
class BienimmobilierFactory extends Factory
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
            'lib_bien' => fake()->sentence(),
            'description'=>fake()->paragraph(),
            'photo'=>fake()->image(),
            'prix'=>fake()->randomFloat(2,10,1000),
            'status'=>fake()->boolean()
        ];
    }
}
