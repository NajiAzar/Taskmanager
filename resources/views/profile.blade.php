@extends('layouts.dash')
@section('content')
<div class="container-fluid">
    <div class="row">
        <main>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">User Profile</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Information</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                    </ul>
                </div>
            </div>

            {{-- Assigned Tasks Section --}}
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Assigned Tasks</h5>
                    @if ($user->tasks->count() > 0)
                        <ul class="list-group">
                            @foreach ($user->tasks as $task)
                                <li class="list-group-item">
                                    <strong>Title:</strong> {{ $task->title }}<br>
                                    <strong>Description:</strong> {{ $task->description }}<br>
                                    <strong>Category:</strong> {{ $task->category->name }}<br>
                                    <strong>Due Date:</strong> {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('j F Y') : 'N/A' }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No tasks assigned.</p>
                    @endif
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
