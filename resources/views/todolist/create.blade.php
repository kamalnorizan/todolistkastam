@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Todo</h1>
    <form action="{{ route('todolist.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" required>
            <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
            <small class="text-danger">{{ $errors->first('description') }}</small>
        </div>
        <div class="mb-3">
            <label for="todo_category_id" class="form-label">Category</label>
            <select name="todo_category_id" class="form-control  {{ $errors->has('todo_category_id') ? 'is-invalid' : '' }}" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option {{ old('todo_category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('todo_category_id') }}</small>
        </div>
        <div class="mb-3">
            <label for="assigned_to" class="form-label">Assign To</label>
            <select name="assigned_to" class="form-control {{ $errors->has('assigned_to') ? 'is-invalid' : '' }}">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option {{ old('assigned_to') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('assigned_to') }}</small>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control {{ $errors->has('due_date') ? 'is-invalid' : '' }}" value="{{ old('due_date') }}">
            <small class="text-danger">{{ $errors->first('due_date') }}</small>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
            <small class="text-danger">{{ $errors->first('image') }}</small>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('todolist.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
