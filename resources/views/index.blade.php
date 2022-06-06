@extends('layout.app')

@section('title', 'Create Post')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Start</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Posts</a>
            </div>
        </div>
    </div>
@endsection
