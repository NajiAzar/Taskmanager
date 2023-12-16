@extends('layouts.dash')

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Sidebar (if you have one) -->

        <!-- Main content area -->
        <main>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Task Details</h1>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ $task->category->name }}</p>
                    <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('j F Y') : 'N/A' }}</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection