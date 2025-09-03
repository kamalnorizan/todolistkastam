<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TodoCategory>
 */
class TodoCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
        ];
    }
}
