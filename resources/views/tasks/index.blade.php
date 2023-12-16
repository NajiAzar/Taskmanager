@extends('layouts.dash')
@section('content')
<div class="container-fluid">
    <div class="row">
        <main>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Task List</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group">
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
                    </div>
                </div>
            </div>
            @if(count($tasks) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Due Date</th>
                        <th>Assigned User</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->category->name }}</td>
                        <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('j F Y') : 'N/A' }}</td>
                        <td>{{ $task->user ? $task->user->name : 'Unassigned' }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">View</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post"
                                style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
            @else
            <p>No tasks found.</p>
            @endif
        </main>
    </div>
</div>
@endsection
