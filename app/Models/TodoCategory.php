<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoCategory extends Model
{
    /** @use HasFactory<\Database\Factories\TodoCategoryFactory> */
    use HasFactory;

    /**
     * Get the todo items for the category.
     */
    public function todoItems()
    {
        return $this->hasMany(TodoItem::class);
    }
}
