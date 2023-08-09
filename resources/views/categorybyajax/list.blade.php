@extends('master')
@section('title', 'List Categories')
@section('content')
    @include('categorybyajax.add')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-12 mt-2">
                        <div class="card">
                            <button id="load-categories">Load Categories</button>
                            <div class="card-header">
                                List-Category
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <a id="add-category-button" class="btn btn-success mb-2">ADD</a>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Content</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="category-table-body">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
