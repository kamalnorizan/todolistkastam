<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    /** @use HasFactory<\Database\Factories\TodoItemFactory> */
    use HasFactory;

    /**
     * Get the category that owns the todo item.
     */
    public function category()
    {
        return $this->belongsTo(TodoCategory::class, 'todo_category_id');
    }

    /**
     * Get the user who created the todo item.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user assigned to the todo item.
     */
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
