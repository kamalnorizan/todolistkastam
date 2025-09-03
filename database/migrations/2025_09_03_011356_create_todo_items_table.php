<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todo_items', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 255)->unique();
            $table->string('title', 255);
            $table->text('description');
            $table->string('image_path', 255)->nullable();
            $table->boolean('completed')->default(false);
            $table->date('due_date')->nullable();
            $table->foreignId('todo_category_id')->constrained('todo_categories')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('assigned_to')->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_items');
    }
};
