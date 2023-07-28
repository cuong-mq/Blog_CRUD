    @extends('master')
    @section('title', 'List Posts')
    @section('content')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 col-md-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    List-post
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <a class="btn btn-success mb-2"
                                            href="{{ route('post.create', $categoryId) }}">ADD</a>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Description</th>
                                                    <th>Content</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($posts as $key => $post)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $post->name }}</td>
                                                        <td>{{ $post->slug }}</td>
                                                        <td>{{ $post->description }}</td>
                                                        <td>{{ $post->content }}</td>
                                                        <td> <a href="{{ route('post.edit', $post->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                            <form method="post"
                                                                action="{{ route('post.delete', $post->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    @endsection
