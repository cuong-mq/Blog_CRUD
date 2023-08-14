@extends('master')
@section('title', 'List Opption Post')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <form method="GET">
                    <div class="row">
                        <select class="categorySelect" name="category_id" id="categorySelect">
                            <option value="">All</option>
                        </select>
                        <button type="button" class="btn btn-cyan btn-sm" id="load-posts">Show</button>
                    </div>
                </form>

            </div>
        </section>
    </div>
    <div class="col-12 col-md-12 mt-2">
        <div class="card">
            <div class="card-header">
                List-Post-By Ajax
            </div>
            <div class="card-body">
                <div class="col-12">
                    <a class="btn btn-success mb-2" id="add-post-button">ADD</a>
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
                        <tbody id="post-table-body">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('postbyajax.add')
    @include('postbyajax.edit')
@endsection
