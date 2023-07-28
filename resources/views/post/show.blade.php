@extends('master')
@section('title', 'Choose Post')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('post.index') }}" method="GET">
                    <div class="row">
                        <select name="category_id" id="categorySelect">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm">Show</button>
                </form>

            </div>
    </div>
    </section>
    </div>
@endsection
