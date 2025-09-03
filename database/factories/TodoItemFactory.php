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
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'image_path' => null,
            'completed' => $this->faker->boolean(),
            'due_date' => $this->faker->date(),
            'todo_category_id' => TodoCategory::inRandomOrder()->first()->id,
            'created_by' => User::inRandomOrder()->first()->id,
            'assigned_to' => User::inRandomOrder()->first()->id,
        ];
    }
}
