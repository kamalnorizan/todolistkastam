@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Todo</h1>
    <form action="{{ route('todolist.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $todo->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $todo->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="todo_category_id" class="form-label">Category</label>
            <select name="todo_category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($todo->todo_category_id == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="created_by" class="form-label">Created By</label>
            <select name="created_by" class="form-control" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($todo->created_by == $user->id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="assigned_to" class="form-label">Assign To</label>
            <select name="assigned_to" class="form-control">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($todo->assigned_to == $user->id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $todo->due_date) }}">
        </div>
        <div class="mb-3">
            <label for="completed" class="form-label">Completed</label>
            <select name="completed" class="form-control">
                <option value="0" @if(!$todo->completed) selected @endif>No</option>
                <option value="1" @if($todo->completed) selected @endif>Yes</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('todolist.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
