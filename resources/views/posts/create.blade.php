@extends('layout.app')

@section('title', 'Create Post')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Create Post</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Url:</label>
                    <input type="text" name="url" class="form-control" placeholder="Url">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Text:</label>
                    <textarea class="form-control" style="height:150px" name="text" placeholder="Text"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Sort order:</label>
                    <input type="number" name="sort_order" value="1" class="form-control" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="active" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Active
                    </label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection
