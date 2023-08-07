@extends('master')
@section('title', 'Choose Post')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('post.index') }}" method="GET">
                    <div class="row">
                        <select name="category_id" id="categorySelect">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (Request::get('category_id') == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-cyan btn-sm">Show</button>
                    </div>
                </form>
                <div class="col-12 col-md-12 mt-2">
                    <div class="card">
                        <div class="card-header">
                            List-post
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <a class="btn btn-success mb-2" href="{{ route('post.create') }}">ADD</a>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Name</th>
                                            <th>Category-Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                            <th>Content</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $key => $post)
                                            <tr>
                                                <td>{{ $posts->firstItem() + $key }}</td>
                                                <td>{{ $post->name }}</td>
                                                <td>{{ $post->category->name }}</td>
                                                <td>{{ $post->slug }}</td>
                                                <td>{{ $post->description }}</td>
                                                <td>{{ $post->content }}</td>
                                                <td>
                                                    <a href="{{ route('post.edit', $post->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <form method="post" action="{{ route('post.delete', $post->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $posts->appends(['category_id' => Request::get('category_id')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
