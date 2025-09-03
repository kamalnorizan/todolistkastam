<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\TodoItem;
use App\Models\TodoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function index()
    {
        $todos = TodoItem::where(function($query){
            $query->where('created_by', Auth::user()->id)->orWhere('assigned_to', Auth::user()->id);
        })->with(['category', 'createdBy', 'assignedTo'])->paginate(10);
        return view('todolist.index', compact('todos'));
    }

    public function create()
    {
        $categories = TodoCategory::all();
        $users = User::all();
        return view('todolist.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'image' => 'required|mimetypes:image/jpeg,image/png|max:2048',
            'todo_category_id' => 'required|exists:todo_categories,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
            $validated['image_path'] = $validated['image'] ?? null;
        }

        $validated['created_by'] = Auth::user()->id;
        $validated['uuid'] =Uuid::uuid4()->toString();
        TodoItem::create($validated);
        return redirect()->route('todolist.index')->with('success', 'Todo created!');
    }

    public function edit(TodoItem $todolist)
    {
        $categories = TodoCategory::all();
        $users = User::all();
        return view('todolist.edit', [
            'todo' => $todolist,
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    public function update(Request $request, TodoItem $todolist)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'todo_category_id' => 'required|exists:todo_categories,id',
            'created_by' => 'required|exists:users,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);
        $todolist->update($validated);
        return redirect()->route('todolist.index')->with('success', 'Todo updated!');
    }

    public function destroy(TodoItem $todolist)
    {
        $todolist->delete();
        return redirect()->route('todolist.index')->with('success', 'Todo deleted!');
    }
}
