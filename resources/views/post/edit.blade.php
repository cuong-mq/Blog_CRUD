@extends('master')
@section('title', 'Edit Post')
@section('content')
    <div class="col-12 col-md-12 mt-2">
        <div class="col-12 col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Edit Post
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <form method="post" action="{{ route('post.update', $post->id) }}">
                            @method('PUT')
                            @csrf
                            <!-- Thêm CSRF token để bảo mật form -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $post->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select class="itemName form-control select2" id="category_id" name="category_id"
                                    autocomplete="off" validate="true" label="category">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id === $post->category_id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="error_category"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ $post->slug }}">
                                <div class="btn-danger d-inline-block">{{ $errors->first('slug') }}</div>
                                @error('firstname')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ $post->description }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <input type="text" class="form-control" name="content" value="{{ $post->content }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a type="button" href="{{ route('post.index') }}" class="btn btn-secondary">Exit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
