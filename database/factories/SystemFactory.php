<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SystemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(4),
            'status' => $this->faker->randomElement(['working', 'infected']),
            'observation' => $this->faker->sentence(),
            'children' => $this->faker->boolean(),
        ];
    }
}
