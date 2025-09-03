@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo List</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('todolist.create') }}" class="btn btn-primary mb-3">Add Todo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Created By</th>
                <th>Assigned To</th>
                <th>Due Date</th>
                <th>Completed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->category->name ?? '-' }}</td>
                    <td>{{ $todo->createdBy->name ?? '-' }}</td>
                    <td>{{ $todo->assignedTo->name ?? '-' }}</td>
                    <td>{{ $todo->due_date }}</td>
                    <td>{{ $todo->completed ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('todolist.edit', $todo) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('todolist.destroy', $todo) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this todo?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $todos->links() }}
</div>
@endsection
