<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\TodoCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TodoItem>
 */
class TodoItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'description' => $this->faker->optional()->paragraph(),
            'completed' => $this->faker->boolean(20),
            'due_date' => $this->faker->optional()->date(),
            'todo_category_id' => TodoCategory::inRandomOrder()->first()->id,
            'created_by' => User::inRandomOrder()->first()->id,
            'assigned_to' => User::inRandomOrder()->first()->id,
        ];
    }
}
