@extends('layouts.dash')

@section('content')
<div class="container-fluid">
    <div class="row">
        <main>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Categories</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group">
                        <a href="{{ route('categories.index') }}" class="btn btn-primary">Show all</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Add Category</h2>
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Category Description</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection