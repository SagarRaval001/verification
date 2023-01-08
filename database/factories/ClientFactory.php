<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'company' => $this->faker->name(),
            'source_bdm' => $this->faker->unique()->randomDigit,
            'contact_no' => $this->faker->randomDigit,
            'email' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->text,
            'year' => now('Y'),
            'status' => 1,
        ];
    }
}
