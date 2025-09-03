<?php

namespace Database\Seeders;

use App\Models\TodoCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TodoItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(50)->create();
        TodoItem::truncate();
        TodoCategory::each(function ($category) {
            $category->items()->delete();
            $category->delete();
        });

        $this->call([
            TodoCategorySeeder::class,
            TodoItemSeeder::class,
        ]);

    }
}
