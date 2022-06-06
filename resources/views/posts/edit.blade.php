@extends('layout.app')

@section('title', 'Edit Post')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Edit Post</h2>
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

    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Url:</strong>
                    <input type="text" name="url" value="{{ $post->url }}" class="form-control" placeholder="Url">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="text" placeholder="Text">{{ $post->text }}</textarea>
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
                    <input type="number" name="sort_order" value="{{ $post->sort_order }}" class="form-control" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="active" id="flexCheckChecked" @if ($post->active) checked @endif>
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
