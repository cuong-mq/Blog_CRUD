@extends('master')
@section('title', 'Add Category')
@section('content')

    <div class="col-12 col-md-12 mt-2">
        <div class="col-12 col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Add Category
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <form method="post" action="{{ route('category.store') }}">
                            @csrf
                            <!-- Thêm CSRF token để bảo mật form -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <input type="text" class="form-control" name="content" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a type="button" href="{{ route('category.index') }}" class="btn btn-secondary">Exit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
