<!-- tasks.edit.blade.php -->

@extends('layouts.dash')

@section('content')
<div class="container-fluid">
    <div class="row">
        <main>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Task</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tasks.update', $task->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title" class="form-label">Task Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $task->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Task Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                required>{{ old('description', $task->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="" selected disabled>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date"
                                value="{{ old('due_date', $task->due_date) }}">
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Assigned User</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="" selected disabled>Select an assigned user</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $task->user_id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
