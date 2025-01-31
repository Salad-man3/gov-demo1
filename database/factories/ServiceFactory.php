<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $counter = 0; // Static variable to keep track of the counter

        return [
            'name' => 'name' . ++$counter, // Increment the counter and use it in the name
            'description' => 'description' . $counter,
        ];
    }
}
