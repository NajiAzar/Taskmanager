@extends('layouts.dash')

@section('content')
<div class="container-fluid">
    <div class="row">
        <main >
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Category</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Show All</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $category->description) }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
