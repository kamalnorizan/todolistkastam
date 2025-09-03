<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoCategory extends Model
{
    /** @use HasFactory<\Database\Factories\TodoCategoryFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function items()
    {
        return $this->hasMany(TodoItem::class, 'todo_category_id');
    }
}
